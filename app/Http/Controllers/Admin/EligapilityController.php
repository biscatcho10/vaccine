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
        $eligapility = $vaccine->eligapility;
        return view('backend.eligapilities.eligapility-form', compact('eligapility', 'vaccine'));
    }

    public function update(Request $request, Vaccine $vaccine)
    {
        Eligapility::updateOrCreate(
            ['vaccine_id' => $vaccine->id],
            ['page_title' => $request->page_title, 'eligapilities' => $request->eligapilities]
        );

        return redirect()->route('vaccine.show', $vaccine)->with('success', 'vaccine\'s exceptions added successfully.');
    }
}
