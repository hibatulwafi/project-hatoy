<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Petugas extends Authenticatable
{
    protected $table ='tbpetugas'; 
    protected $primaryKey = 'id_petugas';
    
    protected $fillable = [
       'id_petugas', 'email', 'password','role','namalengkap'
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
