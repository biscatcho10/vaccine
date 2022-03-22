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

    public function conditions()
    {
        return $this->hasMany(Condition::class);
    }

    public function exceptionsd()
    {
        return $this->hasMany(Exception::class, 'vaccine_id');
    }
    /** End Relations  **/

}
