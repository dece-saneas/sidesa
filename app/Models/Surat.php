<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = "data_request_surat";
	
    protected $fillable = [
		'user_id', 'type', 'message', 'status',
	];
	
	public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
}
