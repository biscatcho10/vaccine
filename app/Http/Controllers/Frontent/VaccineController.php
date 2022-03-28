<?php

namespace App\Http\Controllers\Frontent;

use anlutro\LaravelSettings\Facades\Setting;
use App\Http\Controllers\Controller;
use App\Http\Resources\VaccineResource;
use App\Models\Interval;
use App\Models\Vaccine;
use Illuminate\Http\Request;

class VaccineController extends Controller
{
    public function index()
    {
        // dd(Vaccine::pluck('name', 'id')->toArray());
        return view('welcome', [
            'settings' => Setting::all(),
            'page_image' => asset("storage/images/settings/" . Setting::get('page_image')),
            'vaccines' => Vaccine::pluck('name', 'id')->toArray()
        ]);
    }

    public function makeRequest(Request $request)
    {
        dd($request->all());
    }

    public function vaccineData(Vaccine $vaccine)
    {
        $vaccine = new VaccineResource($vaccine);
        return response()->json($vaccine);
    }

    public function dayIntervals(Vaccine $vaccine, $day)
    {
        $day = $vaccine->days()->where('name', $day)->first();
        $intervals = $day->intervals->pluck('interval')->toArray();
        return response()->json($intervals);
    }
}
