<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestAnswer extends Model
{
    protected $fillable = [
        "vaccine_id",
        "patient_hcm",
        "timestamps",
    ];

    /** Begin Relations  **/
    public function request()
    {
        return $this->belongsTo(Request::class);
    }

    /** End Relations  **/
}
