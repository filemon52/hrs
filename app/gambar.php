<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gambar extends Model
{
	protected $primaryKey = 'id_gambar';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_stok', 'id_gambar','gambar','no'];

}
