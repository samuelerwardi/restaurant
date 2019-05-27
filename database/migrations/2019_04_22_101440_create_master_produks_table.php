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
            $table->string('produk_kode');
            $table->string('produk_nama');
            $table->string('deskripsi');
            $table->decimal('keuntungan',11,2);
            $table->decimal('harga_jual',11,2);
            $table->timestamps();
            $table->softDeletes();
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
