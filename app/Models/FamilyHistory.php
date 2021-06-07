<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyHistory extends Model
{
    protected $fillable = 
    [
        'Mother',
        'Father',
        'Sisters',
        'Brothers',
        'Children',
    ];
}
