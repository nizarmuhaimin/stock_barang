<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items'; // Pastikan nama tabel sesuai

    protected $primaryKey = 'id'; // Pastikan nama primary key sesuai

    protected $fillable = ['name', 'description', 'id_kategori', 'SKU', 'stock', 'gambar']; // Menambah 'description' ke dalam fillable

    // Definisikan relasi dengan model Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}
