<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Day;
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
        $day = $vaccine->days()->find($day->id);
        $day->update([
            'intervals' => $request->intervals
        ]);
        return redirect()->route('vaccine.show', $vaccine)->with('success', 'day intervals added successfully.');
    }
}
