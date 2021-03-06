<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $timestamps = true;
    
    protected $fillable = array('key', 'value');
}
