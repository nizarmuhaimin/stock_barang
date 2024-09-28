<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSkuAndIdKategoriToItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            if (!Schema::hasColumn('items', 'SKU')) {
                $table->string('SKU')->after('id');
            }
            if (!Schema::hasColumn('items', 'id_kategori')) {
                $table->unsignedBigInteger('id_kategori')->after('SKU');

                // Menambahkan foreign key constraint
                $table->foreign('id_kategori')->references('id_kategori')->on('kategori')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            // Menghapus foreign key constraint terlebih dahulu
            $table->dropForeign(['id_kategori']);

            // Menghapus kolom
            $table->dropColumn(['SKU', 'id_kategori']);
        });
    }
}
