<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameShippedAtColumnInStockOutTable extends Migration
{
    public function up()
    {
        Schema::table('stock_out', function (Blueprint $table) {
            $table->renameColumn('shipped_at', 'received_at');
        });
    }

    public function down()
    {
        Schema::table('stock_out', function (Blueprint $table) {
            $table->renameColumn('received_at', 'shipped_at');
        });
    }
}

