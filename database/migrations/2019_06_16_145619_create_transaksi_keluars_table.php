<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_keluars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jenis_transaksi');
            $table->string('ref_no');
            $table->decimal('tanggal',11,2);
            $table->decimal('nominal',11,2);
            $table->string('keterangan');
            $table->string('document');
            $table->string('fullpath');
            $table->softDeletes();
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
        Schema::dropIfExists('transaksi_keluars');
    }
}
