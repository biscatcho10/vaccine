<?php

namespace App\Http\Controllers\Frontent;

use anlutro\LaravelSettings\Facades\Setting;
use App\Http\Controllers\Controller;
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
}
