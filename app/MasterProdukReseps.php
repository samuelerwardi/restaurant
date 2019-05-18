<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterProdukReseps extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'master_produk_id',
        'master_bahan_id',
        'qty',
        'created_at',
        'updated_at'
    ];

    public function MasterProduk()
    {
        return $this->belongsTo('App\MasterProduk');
    }

    public function getMasterBahan()
    {
        $query = $this->hasOne("App\MasterBahan","id","master_bahan_id");

        return $query->get();
    }


}
