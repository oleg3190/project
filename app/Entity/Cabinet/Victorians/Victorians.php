<?php

namespace App\Entity\Cabinet\Victorians;

use Illuminate\Database\Eloquent\Model;

class Victorians extends Model
{
    //
    protected $fillable = ['name','chanel','timeStart','timeInterval','timeStop','user_id'];

    protected $table = 'victorians';
}
