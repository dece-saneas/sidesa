<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
	use HasRoles;
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	
	public function nik()
    {
    	return $this->hasOne('App\Models\NIK');
    }
	
	public function rt()
    {
    	return $this->hasOne('App\Models\RT');
    }
	
	public function rw()
    {
    	return $this->hasOne('App\Models\RW');
    }
	
	public function dusun()
    {
    	return $this->hasOne('App\Models\Dusun');
    }
    
    public function warga_kurang_mampu()
    {
    	return $this->hasOne('App\Models\KurangMampu');
    }
    
    public function jurnalis()
    {
    	return $this->hasOne('App\Models\Jurnalis');
    }
    
    public function news()
    {
    	return $this->hasMany('App\Models\Jurnalis');
    }
}
