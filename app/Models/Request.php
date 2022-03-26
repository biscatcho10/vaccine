<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        "vaccine_id",
        "date",
        "time",
        "patient_id",
        "eligapility",
        "approve_conditions",
    ];

        /** Begin Relations  **/
        public function vaccine()
        {
            return $this->belongsTo(Vaccine::class);
        }

        public function patient()
        {
            return $this->belongsTo(Patient::class);
        }

        public function request_answer()
        {
            return $this->hasOne(Patient::class);
        }

        /** End Relations  **/
}
