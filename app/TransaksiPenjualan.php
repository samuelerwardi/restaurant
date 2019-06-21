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
