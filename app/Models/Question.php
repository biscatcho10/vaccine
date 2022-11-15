<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        "question",
        "input_type",
        "required",
        "select_type",
        "options",
        "vaccine_id",
        "order",
    ];

    protected $casts = [
        'options' => 'array',
    ];

}
