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

    public function getMasterBahan()
    {
        $query = $this->hasOne("App\MasterBahan", "id", "master_bahans_id");
        return $query->first();
    }

    public function scopeSumQtyByMasterBahansId($query, $master_bahans_id)
    {
        $query->select(DB::raw('SUM(qty) as qty'))
            ->where('master_bahans_id', '=', $master_bahans_id)
            ->groupBy("master_bahans_id");
        return $query;
//      dump($query);
//      $query->group
//        die;
    }

    public function scopeSumQtyAll($query, $request)
    {
        $query->select(DB::raw('master_bahans_id, SUM(qty) as qty'));
        if (!empty($request["from"])){
            $query->where('created_at', '>=', $request["from"]);
        }
        if (!empty($request["to"])){
            $query->where('created_at', '<=', $request["to"]." 23:59:59");
        }

        $query->groupBy("master_bahans_id");
        return $query;
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
