<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";
	
    protected $fillable = [
		'user_id', 'title', 'content', 'image', 'status',
	];
	
	public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
}
