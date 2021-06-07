<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialHistory extends Model
{
	protected $fillable = 
    [
        'Standing',
        'Sit_at_a_desk',
        'Work_on_a_computer',
        'Work_on_a_phone',
        'Moderate',
        'Stay_at_home',
        'Deliver_packages',
        'Retired',
        'Tobacco_Smoke',
        'Alcoholic_beverages',
        'Caffeine',
        'Exercise'

    ];
}
