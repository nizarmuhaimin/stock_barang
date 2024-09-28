<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Kategori::all();
        return view('frontend.admin.tampilkategori', compact('categories'));
    }

    public function create()
    {
        return view('frontend.admin.createkategori');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Kategori::create($request->only('name'));

        return redirect()->route('admin.tampilkategori')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit($id_kategori)
    {
        $category = Kategori::find($id_kategori);
        return view('frontend.admin.editkategori', compact('category'));
    }

    public function update(Request $request, $id_kategori)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Kategori::findOrFail($id_kategori);
        $category->update($request->only('name'));

        return redirect()->route('admin.tampilkategori')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id_kategori)
    {
        // Cari kategori berdasarkan ID
        $category = Kategori::findOrFail($id_kategori);

        // Hapus kategori
        $category->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('admin.tampilkategori')->with('success', 'Kategori berhasil dihapus.');
    }


}
