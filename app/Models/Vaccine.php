<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    protected $fillable = [
        "name",
        "definded_period",
        "from",
        "to",
        "available_days",
        "has_diff_ages",
        "diff_ages",
    ];

    protected $casts = [
        'available_days' => 'array',
        'diff_ages' => 'array'
    ];

    /** Begin Relations  **/

    public function conditions()
    {
        return $this->hasMany(Condition::class);
    }

    /** End Relations  **/

}
