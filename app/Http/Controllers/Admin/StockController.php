<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vaccine;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function getStock()
    {
        $data = Vaccine::get();
        return view('backend.stock.index', compact('data'));
    }

    public function getStockVaccine(Vaccine $vaccine)
    {
        return view('backend.stock.edit', compact('vaccine'));
    }


    public function updateStock(Vaccine $vaccine, Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric'
        ]);
        $vaccine->amount = $request->amount;
        $vaccine->save();
        return redirect()->back()->with('success', 'Stock updated successfully');
    }
}
