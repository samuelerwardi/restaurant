<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiPenjualanDetails extends Model
{
    //
    use SoftDeletes;
    public $timestamps = false;
    //
    /**
     * @var array
     */
    protected $fillable = [
        'transaksi_penjualan_id',
        'master_produks_id',
        'price',
        'qty',
        'subtotal',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function getMasterProduk(){
        return $this->hasOne("App\MasterProduk","id", "master_produks_id")->first();
    }
}
