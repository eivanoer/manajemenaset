<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    protected $fillable = [
        'kode',  'nama', 
    ];
    protected $hidden = [];
}
//