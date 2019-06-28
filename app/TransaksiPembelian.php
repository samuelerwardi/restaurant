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
        'ppn',
        'grand_total',
        'created_at',
        'updated_at'
    ];
    /**
     * @var string
     */
    protected $table = 'transaksi_pembelian';

    public function getSupplier(){
        $query = $this->hasOne("App\Supplier","id","supplier_id")->withTrashed();
        return $query->first();
    }

    public function getTransaksiPembelianDetails(){
        $query = $this->hasMany("App\TransaksiPembelianDetails","transaksi_pembelian_id","id");
        return $query->get();
    }

    public function scopeFilterCreateAtFrom($query, $date)
    {

        if (is_null($date)) return $query;

        return $query->where('created_at', '>=', $date);
    }

    public function scopeFilterCreateAtTo($query, $date)
    {
        if (is_null($date)) return $query;

        return $query->where('created_at', '<=', $date." 23:59:59");
    }
}
