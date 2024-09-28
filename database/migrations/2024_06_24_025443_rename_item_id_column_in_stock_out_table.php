<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameItemIdColumnInStockOutTable extends Migration
{
    public function up()
    {
        Schema::table('stock_out', function (Blueprint $table) {
            $table->renameColumn('item_id', 'id_items');
        });
    }

    public function down()
    {
        Schema::table('stock_out', function (Blueprint $table) {
            $table->renameColumn('id_items', 'item_id');
        });
    }
}

