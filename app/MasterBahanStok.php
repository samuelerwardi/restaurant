<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class MasterBahanStok extends Model
{
    use SoftDeletes;
    public $timestamps = false;
    //
    /**
     * @var array
     */
    protected $fillable = [
        'master_bahans_id',
        'qty',
        'class',
        'created_at',
        'updated_at',
    ];
    /**
     * @var string
     */
    protected $table = 'master_bahans_stok';

    public function MasterBahan()
    {
        return $this->belongsTo('App\MasterBahan');
    }

    public function scopeSumQtyByMasterBahansId($query, $master_bahans_id)
    {
        $query->select(DB::raw('SUM(qty) as qty'))
                ->where('master_bahans_id','=', $master_bahans_id)
                ->groupBy("master_bahans_id");
        return $query;
//      dump($query);
//      $query->group
//        die;
    }
}
