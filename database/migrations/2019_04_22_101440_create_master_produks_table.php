<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_produks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('master_produk_resep_id');
            $table->string('produk_kode');
            $table->string('produk_nama');
            $table->decimal('harga_jual',11,2);
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
        Schema::dropIfExists('master_produks');
    }
}
