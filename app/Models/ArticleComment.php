<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleComment extends Model
{
    protected $table = "articles_discussion";
	
    protected $fillable = [
		'user_id', 'article_id', 'comment',
	];
	
	public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
    
    public function article()
    {
    	return $this->belongsTo('App\Models\Article');
    }
}
