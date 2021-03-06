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
        $days = Day::where('vaccine_id', $vaccine->id)->whereHas('intervals')->get()->except($day->id)->pluck('name', 'id')->toArray();
        $vaccines = Vaccine::where('id', '!=', $vaccine->id)->get()->pluck('name', 'id')->toArray();
        return view('backend.intervals.intervals-form', compact('vaccine', 'vaccines', 'day', 'days'));
    }


    public function update(Vaccine $vaccine, Day $day, Request $request)
    {
        if ($request->intervals) {
            $day->intervals()->delete();
            foreach ($request->intervals as $interval) {
                Interval::updateOrCreate(
                    ['day_id' => $day->id, 'interval' => $interval['interval']],
                    ['available' => true]
                );
            }
        } elseif ($request->intervals == null) {
            $day->intervals()->delete();
        }

        return redirect()->route('vaccine.show', $vaccine)->with('success', 'day intervals added successfully.');
    }


    public function copy(Vaccine $vaccine, Day $day, Request $request)
    {
        $days = Day::where('vaccine_id', $vaccine->id)->whereHas('intervals')->get()->except($request->target)->pluck('name', 'id')->toArray();
        $intervals = Day::find($request->target)->intervals;
        // delete old intervals
        $day->intervals()->delete();
        foreach ($intervals as $interval) {
            $newInterval = $interval->replicate();
            $newInterval->day_id = $day->id;
            $newInterval->save();
        }
        return redirect()->back()->with([
            'success' => 'Day\'s intervals copied successfully.',
            'vaccine' => $vaccine,
            'days' => $days,
        ]);
    }


    // get day intervals from another vaccine
    public function getIntervals(Vaccine $vaccine)
    {
        $days = Day::where('vaccine_id', $vaccine->id)->whereHas('intervals')->get()->pluck('name', 'id')->toArray();
        return response()->json(['days' => $days]);
    }
}
