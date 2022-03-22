<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exception extends Model
{
    protected $fillable = ["date", "vaccine_id"];

    /** Begin Relations  **/
    public function vaccine()
    {
        return $this->belongsTo(Vaccine::class);
    }

    /** End Relations  **/
}
