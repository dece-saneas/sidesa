<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
	protected $table = "settings";
	
    protected $fillable = [
		'A', 'B', 'C', 'D', 'E', 'F', 'G',
	];
}
