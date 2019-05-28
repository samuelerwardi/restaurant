<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembelianDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_pembelian_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('transaksi_pembelian_id');
            $table->integer('master_bahan_id');
            $table->decimal("price",11,2);
            $table->decimal('qty',11,2);
            $table->decimal("subtotal",11,2);
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
        Schema::dropIfExists('transaksi_pembelian_details');
    }
}
