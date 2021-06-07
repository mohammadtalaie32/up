<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newuser extends Model
{
	 protected $fillable = [
        'firstname',
        'lastname',
        'middleinitial',
        'street',
        'city',
        'zip',
        'email',
        'dobmonth',
        'dobday',
        'dobyear',
        'sex',
        'cellphone',
        'username',
        'password',
        'invitecode',
    ];
}
