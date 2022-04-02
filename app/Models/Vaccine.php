<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    protected $fillable = [
        "name",
        "definded_period",
        "from",
        "to",
        "has_diff_ages",
        "diff_ages",
    ];

    protected $casts = [
        'diff_ages' => 'array',
    ];

    /** Begin Relations  **/
    public function days()
    {
        return $this->hasMany(Day::class);
    }

    public function condition()
    {
        return $this->hasOne(Condition::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function eligapility()
    {
        return $this->hasOne(Eligapility::class);
    }

    public function exceptionsd()
    {
        return $this->hasMany(Exception::class, 'vaccine_id');
    }

    public function requests()
    {
        return $this->hasMany(RequestAnswer::class);
    }
    /** End Relations  **/


    /** Start Helpers **/
    public function getWeekends()
    {
        $weekDays = [
            "saturday",
            "sunday",
            "monday",
            "tuesday",
            "wednesday",
            "thursday",
            "friday",
        ];

        $workDays = $this->days->pluck('name')->toArray();

        return array_diff($weekDays, $workDays);
    }
    /** End Helpers **/
}
