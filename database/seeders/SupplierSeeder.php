<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'nama_supplier' => 'Supplier A',
                'kontak' => '08123456789',
                'alamat' => 'Jl. Supplier A No. 1',
            ],
            [
                'nama_supplier' => 'Supplier B',
                'kontak' => '08567891234',
                'alamat' => 'Jl. Supplier B No. 2',
            ],
            [
                'nama_supplier' => 'Supplier C',
                'kontak' => '08987654321',
                'alamat' => 'Jl. Supplier C No. 3',
            ],
        ];

        Supplier::insert($suppliers);
    }
}
