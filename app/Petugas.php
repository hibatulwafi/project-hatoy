<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Petugas extends Authenticatable
{
    protected $table ='tb_login'; 
    protected $primaryKey = 'id';
    
    protected $fillable = [
       'id', 'username', 'password','nama_akun','level'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function getAuthPassword()
    {
     return $this->password;
    }

   public function setPasswordAttribute($val)
    {
        return $this->attributes['password'] = bcrypt($val);
    }
}
