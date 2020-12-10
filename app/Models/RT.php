<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RT extends Model
{
    protected $table = "data_rukun_tetangga";
	
    protected $fillable = [
		'name', 'rukun_warga_id', 'user_id',
	];
	
	public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
	
	public function rw()
    {
    	return $this->belongsTo('App\Models\RW');
    }
}
