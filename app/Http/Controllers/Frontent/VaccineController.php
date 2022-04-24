<?php

namespace App\Http\Controllers\Frontent;

use anlutro\LaravelSettings\Facades\Setting;
use App\Http\Controllers\Controller;
use App\Http\Requests\VaccineFormRequest;
use App\Http\Resources\VaccineResource;
use App\Models\Patient;
use App\Models\RequestAnswer;
use App\Models\Vaccine;
use App\Models\WaitingList;
use App\Notifications\UserConfirmation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class VaccineController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'settings' => Setting::all(),
            'page_image' => asset("storage/images/settings/" . Setting::get('page_image')),
            'vaccines' => Vaccine::pluck('name', 'id')->toArray()
        ]);
    }

    public function makeRequest(VaccineFormRequest $request)
    {
        $answer = $request->except('_token', 'vaccine', 'age', 'day_date', 'day_time', 'first_name', 'last_name', 'email', 'phone', 'dob', 'address', 'health_card_number', 'eligapility', 'condition_approved', 'process', 'comment');

        // get vaccine
        $vaccine = Vaccine::find($request->vaccine);

        if ($vaccine->amount > 0) {

            // create patient
            $patient = Patient::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'dob' => Carbon::parse($request->dob)->format('Y-m-d'),
                'address' => $request->address,
                'health_card_num' => $request->health_card_number,
            ]);

            // create patient request
            $request_answer = RequestAnswer::create([
                'vaccine_id' => $request->vaccine,
                'day_date' => $request->day_date,
                'day_time' => $request->day_time,
                'day_name' => lcfirst(Carbon::parse($request->day_date)->format('l')),
                'patient_hcm' => $patient->health_card_num,
                'eligapility' => $request->eligapility,
                'comment' => $request->comment,
                'answers' => $answer,
            ]);
            if ($request->age && $request->age != null) {
                $request_answer->update([
                    'age' => $request->age
                ]);
            }

            // update vaccine amount
            $vaccine->update([
                'amount' => $vaccine->amount - 1
            ]);

            // send confirmation email
            $this->sendEmail($patient, $request);
            
        } else {
            $waitingLists = WaitingList::create([
                'vaccine_id' => $request->vaccine,
                'user_name' => $request->first_name . " " . $request->last_name,
                'user_email' => $request->email,
            ]);
        }

        if (Setting::get('redirect')) {
            return redirect(Setting::get('redirect_url'));
        } else {
            return redirect()->route('get.thanks');
        }
    }

    public function vaccineData(Vaccine $vaccine)
    {
        $vaccine = new VaccineResource($vaccine);
        return response()->json($vaccine);
    }

    public function dayIntervals(Vaccine $vaccine, $day)
    {
        $requests = RequestAnswer::where('day_date', $day)->pluck('day_time')->toArray();
        $data = [];
        foreach ($requests as $time) {
            $data[] = Carbon::parse($time)->format('H:i');
        }

        $day_name = lcfirst(Carbon::parse($day)->format("l"));
        $_day = $vaccine->days()->where('name', $day_name)->first();
        $intervals = $_day->intervals->pluck('interval')->toArray();

        if ($requests) {
            $intervals = array_values(array_diff($intervals, $data));
            if (empty($intervals)) {
                $vaccine->exceptionsd()->create([
                    'date' => $day
                ]);
            }
        }


        return response()->json($intervals);
    }

    public function thanks()
    {
        return view('thanks', ['settings' => Setting::all()]);
    }

    public function sendEmail($patient, $request)
    {

        $email_template = Setting::get('email_template');
        $vaccine_name = Vaccine::find($request->vaccine)->name;
        $email_template = str_replace('{user_name}', $patient->name, $email_template);
        $email_template = str_replace('{vaccine}', $vaccine_name, $email_template);
        $email_template = str_replace('{day_date}', $request->day_date, $email_template);
        $email_template = str_replace('{day_time}', $request->day_time, $email_template);

        $details = [
            'subject' => Setting::get('email_subject'),
            'body' => $email_template,
            'actionText' => 'Well Pharamacy',
            'actionURL' => url('/'),
        ];

        // send mail to the patient
        Notification::send($patient, new UserConfirmation($details));
    }
}
