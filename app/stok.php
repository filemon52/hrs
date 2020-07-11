<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stok extends Model
{
	protected $primaryKey = 'id_stok';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_stok','gambar','display', 'nama_stok','jenis', 'kendaraan', 'merk','tipe', 'qty','harga','knalpot'];

    public $incrementing = false;
}
