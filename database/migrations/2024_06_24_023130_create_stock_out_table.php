<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockOutTable extends Migration
{
    public function up()
    {
        Schema::create('stock_out', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained()->onDelete('cascade');
            $table->foreignId('supplier_id')->constrained('supplier')->onDelete('cascade');
            $table->integer('quantity');
            $table->dateTime('shipped_at');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stock_out');
    }
}

