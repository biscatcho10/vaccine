<?php

namespace App\Http\Controllers\Frontent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VaccineController extends Controller
{
    public function makeRequest(Request $request)
    {
        dd($request->all());
    }
}
