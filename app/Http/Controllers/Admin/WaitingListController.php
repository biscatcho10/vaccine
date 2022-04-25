<?php

namespace App\Http\Controllers\Admin;

use anlutro\LaravelSettings\Facades\Setting;
use App\Http\Controllers\Controller;
use App\Mail\AlertWaitingList;
use App\Models\Vaccine;
use Illuminate\Support\Facades\Mail;

class WaitingListController extends Controller
{
    public function waitingList()
    {
        $services = Vaccine::has('waitingLists')->get();
        return view('backend.waiting-lists.index', compact('services'));
    }

    public function waitingListVaccine($id)
    {
        $vaccine = Vaccine::findOrFail($id);
        $waitingLists = $vaccine->waitingLists()->where('notification_sent', false)->orderBy('created_at', 'asc')->get();
        $NotifiedwaitingLists = $vaccine->waitingLists()->where('notification_sent', true)->orderBy('created_at', 'asc')->get();
        return view('backend.waiting-lists.vaccine-waiting-list', compact('vaccine', 'waitingLists', 'NotifiedwaitingLists'));
    }

    public function sendEmails(Vaccine $vaccine)
    {
        $waitingListsCount = $vaccine->waitingLists()->count();
        if ($vaccine->amount > $waitingListsCount) {
            $waitingLists = $vaccine->waitingLists()->where('notification_sent', false)->get();
        }else {
            $waitingLists = $vaccine->waitingLists()->where('notification_sent', false)->take($waitingListsCount)->get();
        }

        foreach ($waitingLists as $waitingList) {
            // send alert email to waiting list user
            $this->sendEmail($vaccine, $waitingList->user_name, $waitingList->user_email);
            $waitingList->notification_sent = true;
            $waitingList->save();
        }

        return redirect()->back()->withSuccess('Emails sent successfully');
    }

    public function sendEmail($vaccine, $name, $email)
    {
        $email_template = Setting::get('wl_email_template');
        $email_template = str_replace('{user_name}', $name, $email_template);
        $email_template = str_replace('{vaccine}', $vaccine->name, $email_template);
        $details = [
            'subject' => Setting::get('wl_email_subject'),
            'body' => $email_template,
            'actionText' => 'Well Pharamacy',
            'actionURL' => url('/'),
        ];

        Mail::to($email)->send(new AlertWaitingList($details));
    }
}
