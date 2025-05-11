<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaitingList extends Model
{
    protected $fillable = [
        'vaccine_id',
        'user_name',
        'user_email',
        'notification_sent',
    ];

    public function vaccine()
    {
        return $this->belongsTo(Vaccine::class);
    }

    // get the last patient that waiting is belong to
    public function patients()
    {
        return $this->hasMany(Patient::class, 'email', 'user_email');
    }
}
