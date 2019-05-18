<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterBahansStok extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_bahans_stok', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('kode_bahan');
            $table->bigInteger('stok');
//            $table->decimal("jumlah",11,2);
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
        Schema::dropIfExists('master_bahans_stok');
    }
}
