<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class merk extends Model
{
	protected $primaryKey = 'id_merk';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_merk', 'nama_merk','gambar','motor','mobil'];

    public $incrementing = false;
}
