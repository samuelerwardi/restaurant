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
}
