<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dusun extends Model
{
	protected $table = "data_dusun";
	
    protected $fillable = [
		'name', 'user_id',
	];
	
	public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
    
    public function rw()
    {
    	return $this->hasMany('App\Models\RW');
    }
}
