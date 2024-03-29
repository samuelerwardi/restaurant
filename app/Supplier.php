<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;
    public $timestamps = false;
    //
    /**
     * @var array
     */
    protected $fillable = [
        'kode',
        'nama',
        'telepon',
        'email',
        'alamat',
        'contact_person',
        'created_at',
        'updated_at'
    ];
    /**
     * @var string
     */
    protected $table = 'suppliers';
}
