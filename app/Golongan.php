<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    protected $fillable = [
        'kode',  'nama', 
    ];
    protected $hidden = [];
}
//