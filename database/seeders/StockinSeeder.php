<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\StockIn;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = Item::all();
        $suppliers = Supplier::all();

        // Data stock in yang ingin dimasukkan
        $stockIns = [
            [
                'id_items' => $items->random()->id,
                'id_supplier' => $suppliers->random()->id,
                'quantity' => 100,
                'received_at' => Carbon::today()->toDateString(),
            ],
            [
                'id_items' => $items->random()->id,
                'id_supplier' => $suppliers->random()->id,
                'quantity' => 50,
                'received_at' => Carbon::today()->toDateString(),
            ],
            [
                'id_items' => $items->random()->id,
                'id_supplier' => $suppliers->random()->id,
                'quantity' => 75,
                'received_at' => Carbon::today()->toDateString(),
            ],
        ];

        StockIn::insert($stockIns);
    }
}
