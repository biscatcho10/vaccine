<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestAnswer extends Model
{
    protected $fillable = [
        "vaccine_id",
        "patient_hcm",
        "eligapility",
        "comment",
        "day_date",
        "day_time",
        "day_name",
        "age",
        "answers",
    ];


    protected $casts = [
        'answers' => 'array',
    ];

    /**
     * @var string[]
     */
    protected $appends = [
        'created_at_date'
    ];

    /** Begin Relations  **/
    public function vaccine()
    {
        return $this->belongsTo(Vaccine::class);
    }

    public function patient()
    {
        return Patient::where('health_card_num', $this->patient_hcm)->first();
    }

    /** End Relations  **/


    /**
     * @return string
     */
    public function getCreatedAtDateAttribute()
    {
        return date("d/m/Y", strtotime($this->created_at));
    }
}
