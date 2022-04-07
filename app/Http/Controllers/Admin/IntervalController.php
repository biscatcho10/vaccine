<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\Interval;
use App\Models\Vaccine;
use Illuminate\Http\Request;

class IntervalController extends Controller
{
    public function get(Vaccine $vaccine, Day $day)
    {
        return view('backend.intervals.intervals-form', compact('vaccine', 'day'));
    }


    public function update(Vaccine $vaccine, Day $day, Request $request)
    {
        if ($request->intervals) {
            foreach ($request->intervals as $interval) {
                Interval::updateOrCreate(
                    ['day_id' => $day->id, 'interval' => $interval['interval']],
                    ['available' => true]
                );
            }

            return redirect()->route('vaccine.show', $vaccine)->with('success', 'day intervals added successfully.');
        }
    }
}
