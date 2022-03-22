<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\Interval;
use App\Models\Vaccine;
use Illuminate\Http\Request;

class DayController extends Controller
{
    public function intervalForm(Vaccine $vaccine, Day $day)
    {
        return view('backend.vaccines.intervals-form', compact('vaccine', 'day'));
    }


    public function updateInterval(Vaccine $vaccine, Day $day, Request $request)
    {
        foreach ($request->intervals as $interval) {
            Interval::updateOrCreate(
                ['day_id' => $day->id, 'interval' => $interval['interval']],
                ['available' => true]
            );
        }

        return redirect()->route('vaccine.show', $vaccine)->with('success', 'day intervals added successfully.');
    }
}
