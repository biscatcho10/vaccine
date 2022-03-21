<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $fillable = [
        "name",
        "timetables",
        "available",
        "vaccine_id",
    ];

    protected $casts = [
        'timetables' => 'array'
    ];
}
