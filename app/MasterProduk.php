<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MasterProduk
 * @package App
 */
class MasterProduk extends Model
{
    use SoftDeletes;
    /**
     * @var bool
     */
    public $timestamps = false;
    /**
     * @var string
     */
    protected $table = 'master_produks';
    /**
     * @var array
     */
    protected $fillable = [
        'produk_kode',
        'produk_nama',
        'deskripsi',
        'keuntungan',
        'harga_jual',
        'created_at',
        'updated_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getMasterProdukReseps()
    {
        return $this->hasMany('App\MasterProdukReseps')->get();
    }
}
