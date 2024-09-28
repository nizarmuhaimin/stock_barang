<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameSupplierIdColumnInStockOutTable extends Migration
{
    public function up()
    {
        Schema::table('stock_out', function (Blueprint $table) {
            $table->renameColumn('supplier_id', 'id_supplier');
        });
    }

    public function down()
    {
        Schema::table('stock_out', function (Blueprint $table) {
            $table->renameColumn('id_supplier', 'supplier_id');
        });
    }
}

