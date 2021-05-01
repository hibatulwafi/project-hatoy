<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $guarded = [];
    protected $table = 'tb_siswa';
    public $timestamps = false;

}
