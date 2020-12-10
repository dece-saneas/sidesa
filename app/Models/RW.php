<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RW extends Model
{
	protected $table = "data_rukun_warga";
	
    protected $fillable = [
		'name', 'dusun_id', 'user_id',
	];
	
	public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
	
	public function dusun()
    {
    	return $this->belongsTo('App\Models\Dusun');
    }
}
