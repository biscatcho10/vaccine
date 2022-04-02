<?php

namespace App\Http\Controllers\Frontent;

use anlutro\LaravelSettings\Facades\Setting;
use App\Http\Controllers\Controller;
use App\Http\Resources\VaccineResource;
use App\Models\Patient;
use App\Models\RequestAnswer;
use App\Models\Vaccine;
use App\Notifications\UserConfirmation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class VaccineController extends Controller
{
    public function index()
    {
        // dd(Vaccine::pluck('name', 'id')->toArray());
        return view('welcome', [
            'settings' => Setting::all(),
            'page_image' => asset("storage/images/settings/" . Setting::get('page_image')),
            'vaccines' => Vaccine::pluck('name', 'id')->toArray()
        ]);
    }

    public function makeRequest(Request $request)
    {
        $answer = $request->except('_token', 'vaccine', 'age', 'day_date', 'day_time', 'first_name', 'last_name', 'email', 'phone', 'dob', 'address', 'health_card_number', 'eligapility', 'condition_approved', 'process');
        // create patient
        $patient =Patient::create([
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
            'answers' => $answer
        ]);

        if ($request->age && $request->age != null ) {
            $request_answer->update([
                'age' => $request->age
            ]);
        }

        $details = [
            'greeting' => 'Hi ' . $patient->name,
            'body' => Setting::get('email_subject'),
            'thanks' => Setting::get('email_template'),
            'actionText' => 'Well Pharamacy',
            'actionURL' => url('/'),
        ];

        Notification::send($patient, new UserConfirmation($details));

        return redirect()->back();
    }

    public function vaccineData(Vaccine $vaccine)
    {
        $vaccine = new VaccineResource($vaccine);
        return response()->json($vaccine);
    }

    public function dayIntervals(Vaccine $vaccine, $day)
    {
        $day = $vaccine->days()->where('name', $day)->first();
        $intervals = $day->intervals->pluck('interval')->toArray();
        return response()->json($intervals);
    }
}
