<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MasterProduk
 * @package App
 */
class Product extends Model
{

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
        'keuntungan',
        'deskripsi',
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
