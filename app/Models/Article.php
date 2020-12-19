<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "articles";
	
    protected $fillable = [
		'user_id', 'title', 'content', 'image', 'status', 'note',
	];
	
	public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
}
