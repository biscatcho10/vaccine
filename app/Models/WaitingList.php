<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaitingList extends Model
{
    protected $fillable = [
        'vaccine_id',
        'patient_id',
    ];

    public function vaccine()
    {
        return $this->belongsTo(Vaccine::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
