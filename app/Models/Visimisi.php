<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visimisi extends Model
{
	protected $table = "set_visimisi";
	
    protected $fillable = [
		'content',
	];
}
