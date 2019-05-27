<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterProdukReseps extends Model
{
    use SoftDeletes;
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
