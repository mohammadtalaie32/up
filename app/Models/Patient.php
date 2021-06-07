<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'firstname',
        'middleinitial',
        'lastname',
        'street',
        'city',
        'zip',
        'state',
        'homephone',
        'workphone',
        'cellphone',
        'email',
        // 'dobmonth',
        // 'dobday',
        // 'dobyear',
        'dob',
        'ssn',
        'maritalstatus',
        'sex',
        'employer',
        'occupation',
        'status',
        'spouselastname',
        'spousefirstname',
        'spousessn',
        'spousedob',
        'emergencyname',
        'emergencyrelationship',
        'emergencyhomephone',
        'emergencycellphone',
        'password',

        'carriername',
        'insuredname',
        'claimsadjuster',
        'insureddob',
        'relationshiptoinsured',
        'policynumber',
        'groupnumber',
        'claimnumber',
        'phonenumber',
        'visitsauthorized',
        'visitsused',
        'insindeductible',
        'insoutdeductible',
        'insinremaining',
        'insincoinsuranc',
        'insoutcoinsurance',
        'insincopay',
        'insoutcopay',
        'insnotes',
        'preexisting',
        'Standing',
        'Sit_at_a_desk',
        'Work_on_a_computer',
        'Work_on_a_phone',
        'Moderate_Heavy_labor',
        'Stay_at_home',
        'Deliver_packages',
        'Retired',
        'Tobacco_Smoke',
        'Alcoholic_beverages',
        'Caffeine',
        'Exercise',
        'Mother',
        'Father',
        'Sisters',
        'Brothers',
        'Children',
        'nickname',
        'caseindicator',
        'status',
        'referredbytype',
        'paymenttype',
        'suffix',
        'coinsurance',
        'coinsurancedp',
        'alternateno',
        'pitype',
        'patientphoto',
        'language'
    ];

    public function exam()
    {
        return $this->hasMany(examsrom::class);
    }

    public function visits()
    {
        return $this->hasMany(Visits::class);
    }
    public function encounters()
    {
        return $this->hasMany(Encounter::class);
    }

    public function hadvisits($date , $onor) {
        $array = [];
        foreach($this as $patient) {
            $encounters = $patient->encounters;
            return $encounters;
        }
    }

}
