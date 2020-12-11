<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RT extends Model
{
    protected $table = "data_rukun_tetangga";
	
    protected $fillable = [
		'number', 'rukun_warga_id', 'user_id',
	];
	
	public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
	
	public function rukun_warga()
    {
    	return $this->belongsTo('App\Models\RW');
    }
}
