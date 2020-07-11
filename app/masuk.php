<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class masuk extends Model
{
	protected $primaryKey = 'id_masuk';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_masuk', 'nama','jenis', 'kendaraan', 'merk','tipe', 'id_stok', 'qty','harga', 'total_harga'];

    public $incrementing = false;
}
