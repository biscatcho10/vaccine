<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RequestAnswer;
use App\Models\User;
use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        if (RequestAnswer::count() > 0) {
            $time = DB::table('request_answers')
                ->select('day_time')
                ->groupBy('day_time')
                ->orderByRaw('COUNT(*) DESC')
                ->limit(1)
                ->get()[0]->day_time;

            $data = DB::table('request_answers')
                ->select('vaccine_id')
                ->groupBy('vaccine_id')
                ->orderByRaw('COUNT(*) DESC')
                ->limit(1)
                ->get();

            $vaccine = Vaccine::find($data[0]->vaccine_id)->name;
        } else {
            $time = "No times yet";
            $vaccine = "No Services yet";
        }


        $user_count = User::count();
        return view('backend.home', compact('vaccine', 'user_count', 'time'));
    }
}
