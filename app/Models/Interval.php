<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interval extends Model
{
    protected $fillable = [
        "interval",
        "available",
        "day_id",
    ];



    /** Begin Relations  **/
    public function day()
    {
        return $this->belongsTo(Day::class);
    }
    /** End Relations  **/
}
