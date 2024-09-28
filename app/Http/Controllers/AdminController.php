<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class AdminController extends Controller
{
    public function dashboard()
    {
        $categories = Kategori::all();
        return view('admin.dashboard', compact('categories'));
    }
    public function tampilKategori()
    {
        $categories = Kategori::all();
        return view('frontend.admin.tampilkategori', compact('categories'));
    }
}
