<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        "question",
        "options",
        "vaccine_id",
    ];

    protected $casts = [
        'options' => 'array',
    ];

}