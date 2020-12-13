<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    protected $table = "aspiration";
	
    protected $fillable = [
		'user_id', 'title', 'message', 'status',
	];
	
	public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
}
