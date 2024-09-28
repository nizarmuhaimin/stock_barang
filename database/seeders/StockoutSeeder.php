<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\StockIn;
use App\Models\Stockout;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua item dan supplier yang ada
        $items = Item::all();
        $suppliers = Supplier::all();

        $stockOuts = [];

        foreach ($items as $item) {
            foreach ($suppliers as $supplier) {
                // Ambil data stock in terakhir untuk item dan supplier ini
                $latestStockIn = StockIn::where('id_items', $item->id)
                    ->where('id_supplier', $supplier->id)
                    ->orderBy('received_at', 'desc')
                    ->first();

                // Tentukan startDate berdasarkan tanggal hari ini
                $startDate = Carbon::now()->addDay(); // Tanggal setelah hari ini

                // Jika ada stock in terakhir, gunakan tanggal setelah stock in terakhir
                if ($latestStockIn) {
                    $latestStockInDate = Carbon::parse($latestStockIn->received_at);
                    if ($latestStockInDate->gte($startDate)) {
                        $startDate = $latestStockInDate->addDay();
                    }
                }

                // Generate random quantity
                $quantity = rand(5, 20);

                // Generate random date after today and before or equal to the latest stock in date
                $receivedAt = Carbon::parse($startDate)->addDays(rand(0, 4))->toDateString();

                $stockOuts[] = [
                    'id_items' => $item->id,
                    'id_supplier' => $supplier->id,
                    'quantity' => $quantity,
                    'received_at' => $receivedAt,
                ];
            }
        }

        Stockout::insert($stockOuts);
    }
}
