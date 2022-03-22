<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    protected $fillable = [
        'page_title',
        'conditions',
        'vaccine_id'
    ];

    protected $casts = [
        'conditions' => 'array',
    ];

    
}
