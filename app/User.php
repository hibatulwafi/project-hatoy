<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table ='tb_login'; 
    protected $primaryKey = 'id';
    
    protected $fillable = [
       'id','email', 'username', 'password','name','level'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
