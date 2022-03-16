<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'dob',
        'address',
        'health_card_num',
    ];



    // attributes
    /**
     * @var string[]
     */
    protected $appends = [
        'created_at_date', 'name'
    ];

    /**
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }

    /**
     * @return string
     */
    public function getCreatedAtDateAttribute()
    {
        return date("d/m/Y", strtotime($this->created_at));
    }
}
