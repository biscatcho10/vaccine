<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Eligapility;
use App\Models\Vaccine;
use Illuminate\Http\Request;

class EligapilityController extends Controller
{
    public function get(Vaccine $vaccine)
    {
        $vaccines = Vaccine::whereHas('eligapility')->get()->except($vaccine->id);
        $eligapility = $vaccine->eligapility;
        return view('backend.eligapilities.eligapility-form', compact('eligapility', 'vaccine', 'vaccines'));
    }

    public function update(Request $request, Vaccine $vaccine)
    {
        Eligapility::updateOrCreate(
            ['vaccine_id' => $vaccine->id],
            ['page_title' => $request->page_title, 'eligapilities' => $request->eligapilities]
        );

        return redirect()->route('vaccine.show', $vaccine)->with('success', 'service\'s acknowledgments added successfully.');
    }


    public function copy(Vaccine $vaccine, Request $request)
    {
        $vaccines = Vaccine::whereHas('eligapility')->get()->except($vaccine->id);
        $eligapility = Vaccine::find($request->target)->eligapility;
        // delete old
        $vaccine->eligapility()->delete();
        $neweligapility = $eligapility->replicate();
        $neweligapility->vaccine_id = $vaccine->id;
        $neweligapility->save();
        return redirect()->back()->with([
            'success' => 'service\'s acknowledgments copied successfully.',
            'eligapility' => $neweligapility,
            'vaccine' => $vaccine,
            'vaccines' => $vaccines,
        ]);
    }
}
