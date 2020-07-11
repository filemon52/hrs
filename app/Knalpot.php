<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Knalpot extends Model
{
	protected $primaryKey = 'id_knalpot';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_knalpot', 'nama_knalpot','gambar'];

    public $incrementing = false;
}
