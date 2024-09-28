<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('frontend.admin.tampil_supplier', compact('suppliers'));
    }

    public function create()
    {
        return view('frontend.admin.tambah_supplier');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_supplier' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        Supplier::create($request->only('nama_supplier', 'kontak', 'alamat'));

        return redirect()->route('admin.tampil_supplier')->with('success', 'Supplier created successfully.');
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('frontend.admin.edit_supplier', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_supplier' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->only('nama_supplier', 'kontak', 'alamat'));

        return redirect()->route('admin.tampil_supplier')->with('success', 'Supplier updated successfully.');
    }

    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->route('admin.tampil_supplier')->with('success', 'Supplier deleted successfully.');
    }
}

