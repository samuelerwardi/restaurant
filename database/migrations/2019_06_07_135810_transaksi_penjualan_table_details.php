<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TransaksiPenjualanTableDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('transaksi_penjualan_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('transaksi_penjualan_id');
            $table->integer('master_produks_id');
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
        //
        Schema::dropIfExists('transaksi_penjualan_details');
    }
}
