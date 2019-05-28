<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiPembelian extends Model
{
    use SoftDeletes;
    public $timestamps = false;
    //
    /**
     * @var array
     */
    protected $fillable = [
        'supplier_id',
        'total',
        'created_at',
        'updated_at'
    ];
    /**
     * @var string
     */
    protected $table = 'transaksi_pembelian';
}
