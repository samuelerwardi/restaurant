<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterProdukResepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_produk_reseps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('master_produk_id');
            $table->integer('master_bahan_id');
            $table->decimal('qty',11,2);
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
        Schema::dropIfExists('master_produk_reseps');
    }
}
