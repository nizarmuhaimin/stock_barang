<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockIn;
use App\Models\Item;
use App\Models\Supplier;

class StockInController extends Controller
{
    public function index()
    {
        $stockIns = StockIn::with('item', 'supplier')->get();
        return view('frontend.admin.stockin', compact('stockIns'));
    }

    public function create()
    {
        $items = Item::all();
        $suppliers = Supplier::all();
        return view('frontend.admin.tambah_stockin', compact('items', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_items' => 'required',
            'id_supplier' => 'required',
            'quantity' => 'required|integer',
        ]);

        StockIn::create($request->all());

        return redirect()->route('admin.stockin')->with('success', 'Stock In created successfully.');
    }

    public function edit($id)
    {
        $stockIn = StockIn::find($id);
        $items = Item::all();
        $suppliers = Supplier::all();
        return view('frontend.admin.edit_stockin', compact('stockIn', 'items', 'suppliers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_items' => 'required',
            'id_supplier' => 'required',
            'quantity' => 'required|integer',
        ]);

        $stockIn = StockIn::find($id);
        $stockIn->update($request->all());

        return redirect()->route('admin.stockin')->with('success', 'Stock In updated successfully.');
    }

    public function destroy($id)
    {
        StockIn::find($id)->delete();
        return redirect()->route('admin.stockin')->with('success', 'Stock In deleted successfully.');
    }
}
