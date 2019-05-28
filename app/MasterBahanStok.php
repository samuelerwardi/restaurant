<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
