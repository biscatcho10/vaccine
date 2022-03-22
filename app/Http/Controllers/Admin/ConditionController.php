<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConditionRequest;
use App\Models\Condition;
use App\Models\Vaccine;
use Illuminate\Http\Request;

class ConditionController extends Controller
{
    public function get(Vaccine $vaccine)
    {
        $condition = $vaccine->condition;
        return view('backend.conditions.conditions-form', compact('condition', 'vaccine'));
    }

    public function update(Request $request, Vaccine $vaccine)
    {
        Condition::updateOrCreate(
            ['vaccine_id' => $vaccine->id],
            ['page_title' => $request->page_title, 'conditions' => $request->conditions]
        );

        return redirect()->route('vaccine.show', $vaccine)->with('success', 'vaccine\'s conditions added successfully.');
    }
}
