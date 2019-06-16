<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiPenjualan extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'total',
        'ppn',
        'grand_total',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $table = 'transaksi_penjualan';

    public function getDetails(){
        $query = $this->hasMany("App\TransaksiPenjualanDetails","transaksi_penjualan_id","id");
        return $query->get();
    }
}
