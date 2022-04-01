<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exception;
use App\Models\Vaccine;
use Illuminate\Http\Request;

class ExceptionController extends Controller
{
    public function get(Vaccine $vaccine)
    {
        return view('backend.exceptions.exception-form', compact('vaccine'));
    }

    public function update(Request $request, Vaccine $vaccine)
    {
        $vaccine->exceptionsd->each->delete();
        foreach ($request->exceptions as $exception) {
            Exception::updateOrCreate(
                ['date' => $exception['date'], 'vaccine_id' => $vaccine->id]
            );
        }

        return redirect()->route('vaccine.show', $vaccine)->with('success', 'vaccine\'s exceptions added successfully.');
    }
}
