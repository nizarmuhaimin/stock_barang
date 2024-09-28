<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Item;
use App\Models\Kategori;
use App\Models\User;
use App\Models\StockIn;
use App\Models\StockOut;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {


        $totalSuppliers = Supplier::count();
        $totalItems = Item::count();
        $totalCategories = Kategori::count();
        $totalStaff = User::where('role', 'staf')->count();

        return view('frontend.dashboard', compact('totalSuppliers', 'totalItems', 'totalCategories', 'totalStaff'));
    }


    public function admin()
    {
        // Ambil data stok masuk per hari
        $stockInData = StockIn::selectRaw('DATE(received_at) as date, SUM(quantity) as total')
            ->whereBetween('received_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->groupBy('date')
            ->get();

        // Ambil data stok keluar per hari
        $stockOutData = StockOut::selectRaw('DATE(received_at) as date, SUM(quantity) as total')
            ->whereBetween('received_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->groupBy('date')
            ->get();

        // Siapkan data untuk chart
        $labels = [];
        $stockDifference = [];

        // Inisialisasi label hari-hari
        $startOfWeek = Carbon::now()->startOfWeek();
        for ($i = 0; $i < 7; $i++) {
            $labels[] = $startOfWeek->copy()->addDays($i)->format('l');
        }

        // Mengisi data stok masuk dan mengurangi dengan stok keluar per hari
        foreach ($labels as $label) {
            $date = Carbon::parse($label)->format('Y-m-d');
            $stockInValue = $stockInData->where('date', $date)->first()->total ?? 0;
            $stockOutValue = $stockOutData->where('date', $date)->first()->total ?? 0;
            $stockDifference[] = $stockInValue - $stockOutValue;
        }

        // Ambil total stok masuk hari ini
        $stockInToday = StockIn::whereDate('received_at', Carbon::today())
            ->sum('quantity');

        // Ambil total stok keluar hari ini
        $stockOutToday = StockOut::whereDate('received_at', Carbon::today())
            ->sum('quantity');

        // Ambil total stok masuk bulan ini
        $stockInThisMonth = StockIn::whereMonth('received_at', Carbon::now()->month)
            ->sum('quantity');

        // Ambil total stok keluar bulan ini
        $stockOutThisMonth = StockOut::whereMonth('received_at', Carbon::now()->month)
            ->sum('quantity');

        $totalSuppliers = Supplier::count();
        $totalItems = Item::count();
        $totalCategories = Kategori::count();
        $totalStaff = User::where('role', 'staff')->count();

        return view(
            'frontend.dashboard',
            compact(
                'totalSuppliers',
                'totalItems',
                'totalCategories',
                'totalStaff',
                'labels',
                'stockDifference',
                'stockInToday',
                'stockOutToday',
                'stockInThisMonth',
                'stockOutThisMonth'
            )
        );
    }

    public function stock()
    {
        // Ambil data stok masuk
        $stockInData = StockIn::selectRaw('DATE(received_at) as date, SUM(quantity) as total')
            ->groupBy('date')
            ->get();

        // Ambil data stok keluar
        $stockOutData = StockOut::selectRaw('DATE(received_at) as date, SUM(quantity) as total')
            ->groupBy('date')
            ->get();

        // Siapkan data untuk chart
        $labels = [];
        $stockInValues = [];
        $stockOutValues = [];

        // Loop melalui data stok masuk dan stok keluar untuk mengisi label dan nilai
        foreach ($stockInData as $data) {
            $labels[] = Carbon::parse($data->date)->format('l');
            $stockInValues[] = $data->total;
        }

        foreach ($stockOutData as $data) {
            $stockOutValues[] = $data->total;
        }

        return view('frontend.admin.dashboard', [
            'labels' => $labels,
            'stockInValues' => $stockInValues,
            'stockOutValues' => $stockOutValues,
        ]);
    }
}
