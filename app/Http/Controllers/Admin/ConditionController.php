<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Condition;
use App\Models\Vaccine;
use Illuminate\Http\Request;

class ConditionController extends Controller
{
    public function get(Vaccine $vaccine)
    {
        $vaccines = Vaccine::all()->except($vaccine->id);
        $condition = $vaccine->condition;
        return view('backend.conditions.conditions-form', compact('condition', 'vaccine', 'vaccines'));
    }

    public function update(Request $request, Vaccine $vaccine)
    {
        Condition::updateOrCreate(
            ['vaccine_id' => $vaccine->id],
            ['page_title' => $request->page_title, 'conditions' => $request->conditions]
        );

        return redirect()->route('vaccine.show', $vaccine)->with('success', 'vaccine\'s conditions added successfully.');
    }

    public function copy(Vaccine $vaccine, Request $request)
    {
        $vaccines = Vaccine::all()->except($vaccine->id);
        $condition = Vaccine::find($request->target)->condition;
        $newCondition = $condition->replicate();
        $newCondition->vaccine_id = $vaccine->id;
        $newCondition->save();
        return redirect()->back()->with([
            'success' => 'vaccine\'s conditions copied successfully.',
            'condition' => $newCondition,
            'vaccine' => $vaccine,
            'vaccines' => $vaccines,
        ]);
    }
}
