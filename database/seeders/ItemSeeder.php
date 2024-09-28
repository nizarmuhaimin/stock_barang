<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'name' => 'Laptop Acer',
                'description' => 'Laptop Acer dengan spesifikasi terbaru.',
                'sku' => 'ACER123',
                'id_kategori' => 1,
                'gambar' => 'default.png',
            ],
            [
                'name' => 'Jaket Casual',
                'description' => 'Jaket casual untuk pria atau wanita.',
                'sku' => 'JKT001',
                'id_kategori' => 2,
                'gambar' => 'default.png',
            ],
            [
                'name' => 'Masker Medis',
                'description' => 'Masker medis untuk melindungi dari virus dan polusi.',
                'sku' => 'MSK789',
                'id_kategori' => 3,
                'gambar' => 'default.png',
            ],
            [
                'name' => 'Pensil 2B',
                'description' => 'Pensil dengan kekerasan 2B untuk menulis atau menggambar.',
                'sku' => 'PNSL456',
                'id_kategori' => 4,
                'gambar' => 'default.png',
            ],

        ];

        Item::insert($items);
    }
}
