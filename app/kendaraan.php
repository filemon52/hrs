<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kendaraan extends Model
{
	protected $primaryKey = 'id_kendaraan';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_kendaraan', 'nama_kendaraan','jenis','merk','gambar','knalpot'];

    public $incrementing = false;
}
