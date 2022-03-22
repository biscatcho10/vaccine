<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eligapility extends Model
{
    protected $fillable = [
        'page_title',
        'eligapilities',
        'vaccine_id'
    ];

    protected $casts = [
        'eligapilities' => 'array',
    ];
}
