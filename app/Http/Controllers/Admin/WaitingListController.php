<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vaccine;
use Illuminate\Http\Request;

class WaitingListController extends Controller
{
    public function waitingList()
    {
        $services = Vaccine::has('waitingLists')->get();
        return view('backend.waiting-lists.index', compact('services'));
    }

    public function waitingListVaccine($id)
    {
        $vaccine = Vaccine::findOrFail($id);
        $waitingLists = $vaccine->waitingLists()->orderBy('created_at', 'desc')->get();
        // dd($waitingLists);
        return view('backend.waiting-lists.vaccine-waiting-list', compact('vaccine', 'waitingLists'));
    }
}
