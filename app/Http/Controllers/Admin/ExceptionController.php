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
        $vaccines = Vaccine::whereHas('exceptionsd')->get()->except($vaccine->id);
        return view('backend.exceptions.exception-form', compact('vaccine', 'vaccines'));
    }

    public function update(Request $request, Vaccine $vaccine)
    {
        $vaccine->exceptionsd->each->delete();
        if ($request->exceptions) {
            foreach ($request->exceptions as $exception) {
                Exception::updateOrCreate(
                    ['date' => $exception['date'], 'vaccine_id' => $vaccine->id]
                );
            }
        }

        return redirect()->route('vaccine.show', $vaccine)->with('success', 'vaccine\'s exceptions added successfully.');
    }


    public function copy(Vaccine $vaccine, Request $request)
    {
        $vaccines = Vaccine::whereHas('questions')->get()->except($vaccine->id);
        $exceptions = Vaccine::find($request->target)->exceptionsd;
        // delete old
        $vaccine->exceptionsd()->delete();
        foreach ($exceptions as $exception) {
            $newException = $exception->replicate();
            $newException->vaccine_id = $vaccine->id;
            $newException->save();
        }
        return redirect()->back()->with([
            'success' => 'vaccine\'s exceptions copied successfully.',
            'vaccine' => $vaccine,
            'vaccines' => $vaccines,
        ]);
    }
}
