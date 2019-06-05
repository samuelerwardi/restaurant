<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MasterBahan
 * @package App
 */
class MasterBahan extends Model
{
    use SoftDeletes;
    public $timestamps = false;
    //
    /**
     * @var array
     */
    protected $fillable = [
        'kode_bahan',
        'nama_bahan',
        'satuan',
        'created_at',
        'updated_at',
    ];
    /**
     * @var string
     */
    protected $table = 'master_bahans';

    public function getMasterBahanStok()
    {
        $query = $this->hasMany("App\MasterBahanStok", "id", "master_bahans_id");

        return $query->get();
    }

    public function scopeAllSearch($query, $request)
    {
        if (is_null($request)) return $query;
        if (!empty($request->get("term"))) {
            $query->where("kode_bahan", 'like', '%' . $request->get("term") . '%')->orWhere("nama_bahan", 'like', '%' . $request->get("term") . '%');
        }
        return $query->get();
    }
}
