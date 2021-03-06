<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $fillable = [
        "name",
        "available",
        "vaccine_id",
    ];




    /** Begin Relations  **/
    public function vaccine()
    {
        return $this->belongsTo(Vaccine::class);
    }

    public function intervals()
    {
        return $this->hasMany(Interval::class);
    }

    /** End Relations  **/
}
