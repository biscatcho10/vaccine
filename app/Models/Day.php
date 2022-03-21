<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $fillable = [
        "name",
        "intervals",
        "available",
        "vaccine_id",
    ];

    protected $casts = [
        'intervals' => 'array'
    ];

    public function vaccine()
    {
        return $this->belongsTo(Vaccine::class);
    }
}
