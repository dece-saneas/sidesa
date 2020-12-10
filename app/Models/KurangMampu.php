<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KurangMampu extends Model
{
    protected $table = "data_warga_kurang_mampu";
	
    protected $fillable = [
		'user_id',
	];
	
	public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
}
