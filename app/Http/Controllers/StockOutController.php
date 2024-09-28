<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stockout;
use App\Models\Item;
use App\Models\Supplier;

class StockoutController extends Controller
{
    public function index()
    {
        $Stockouts = Stockout::with('item', 'supplier')->get();
        return view('frontend.admin.stockout', compact('Stockouts'));
    }

    public function create()
    {
        $items = Item::all();
        $suppliers = Supplier::all();
        return view('frontend.admin.tambah_stockout', compact('items', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_items' => 'required',
            'id_supplier' => 'required',
            'quantity' => 'required|integer',
        ]);

        Stockout::create($request->all());

        return redirect()->route('admin.stockout')->with('success', 'Stock In created successfully.');
    }

    public function edit($id)
    {
        $Stockout = Stockout::find($id);
        $items = Item::all();
        $suppliers = Supplier::all();
        return view('frontend.admin.edit_stockout', compact('Stockout', 'items', 'suppliers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_items' => 'required',
            'id_supplier' => 'required',
            'quantity' => 'required|integer',
        ]);

        $Stockout = Stockout::find($id);
        $Stockout->update($request->all());

        return redirect()->route('admin.stockout')->with('success', 'Stock In updated successfully.');
    }

    public function destroy($id)
    {
        Stockout::find($id)->delete();
        return redirect()->route('admin.stockout')->with('success', 'Stock In deleted successfully.');
    }
}
