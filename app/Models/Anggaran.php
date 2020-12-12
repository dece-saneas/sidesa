<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggaran extends Model
{
    protected $table = "anggaran";
	
    protected $fillable = [
		'code', 'type', 'category', 'description', 'amount', 'status',
	];
	
	public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
}
