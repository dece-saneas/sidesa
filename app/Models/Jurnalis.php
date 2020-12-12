<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurnalis extends Model
{
    protected $table = "data_jurnalis";
	
    protected $fillable = [
		'code', 'user_id',
	];
	
	public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
}
