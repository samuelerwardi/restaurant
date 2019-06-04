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

    public function getSupplier(){
        $query = $this->hasOne("App\Supplier","id","supplier_id");
        return $query->first();
    }

    public function getTransaksiPembelianDetails(){
        $query = $this->hasMany("App\TransaksiPembelianDetails","transaksi_pembelian_id","id");
        return $query->get();
    }
}
