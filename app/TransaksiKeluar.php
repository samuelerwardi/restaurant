<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiKeluar extends Model
{
    //
    use SoftDeletes;
    public $timestamps = false;
    //
    /**
     * @var array
     */
    protected $fillable = [
        'jenis_transaksi',
        'ref_no',
        'tanggal',
        'nominal',
        'keterangan',
        'document',
        'fullpath',
        'created_at',
        'updated_at'
    ];
    /**
     * @var string
     */
    protected $table = 'transaksi_keluar';

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
