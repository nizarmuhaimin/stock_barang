<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stockout extends Model
{
    use HasFactory;

    protected $table = 'Stock_out';

    protected $fillable = [
        'id_items',
        'id_supplier',
        'quantity',
        'received_at',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'id_items');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier');
    }
}
