<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier'; // Sesuaikan nama tabel di sini
    protected $fillable = ['nama_supplier', 'kontak', 'alamat']; // Sesuaikan kolom yang bisa diisi di sini
}
