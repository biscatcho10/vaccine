<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
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
        $user_count = User::count();
        return view('backend.home', compact('vaccine', 'user_count', 'time'));
    }


    public function changeLanguage($locale)
    {
        session()->put('locale', $locale);
        return redirect()->back();
    }

}
