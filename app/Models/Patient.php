<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Patient extends Model
{
    use Notifiable;
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

    public function request()
    {
        return $this->hasOne(RequestAnswer::class);
    }

    /** Begin Relations **/
    public function vaccines()
    {
        return $this->hasMany(Vaccine::class);
    }

    public function waitingLists()
    {
        return $this->hasMany(WaitingList::class);
    }

    public function requests()
    {
        return $this->hasMany(RequestAnswer::class);
    }
    
}
