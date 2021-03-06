<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "articles";
	
    protected $fillable = [
		'user_id', 'title', 'content', 'image', 'status',
	];
	
	public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
    
    public function comment()
    {
    	return $this->hasMany('App\Models\ArticleComment');
    }
}
