<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NIK extends Model
{
    protected $table = "nomor_induk_kependudukan";
	
    protected $fillable = [
		'user_id', 'father_id', 'mother_id', 'code', 'place_of_birth', 'date_of_birth', 'gender', 'blood_type', 'address', 'dusun_id', 'rukun_warga_id', 'rukun_tetangga_id', 'religion', 'married_status', 'job_status',
	];
	
	public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
    
	public function rukun_warga()
    {
    	return $this->belongsTo('App\Models\RW');
    }
    
	public function rukun_tetangga()
    {
    	return $this->belongsTo('App\Models\RT');
    }
}
