<?php

namespace App\Entity\Cabinet\Victorians;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $fillable = ['name','text','img','button','victorians_id'];
}
