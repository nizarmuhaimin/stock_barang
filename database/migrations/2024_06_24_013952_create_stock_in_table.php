<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockIn', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_items')->constrained('items')->onDelete('cascade');
            $table->foreignId('id_supplier')->constrained('supplier')->onDelete('cascade');
            $table->integer('quantity');
            $table->timestamp('received_at')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stockIn');
    }
}
