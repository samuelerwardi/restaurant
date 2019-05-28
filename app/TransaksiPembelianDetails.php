<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiPembelianDetails extends Model
{
    //
    use SoftDeletes;
    public $timestamps = false;
    //
    /**
     * @var array
     */
    protected $fillable = [
        'transaksi_pembelian_id',
        'master_bahan_id',
        'price',
        'qty',
        'subtotal',
        'created_at',
        'updated_at'
    ];
    /**
     * @var string
     */
    protected $table = 'transaksi_pembelian_details';
}
