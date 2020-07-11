<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class keluar extends Model
{
	protected $primaryKey = 'id_keluar';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_keluar', 'nama','jenis', 'kendaraan', 'merk','tipe', 'id_stok', 'qty','harga', 'total_harga'];

    public $incrementing = false;
}
