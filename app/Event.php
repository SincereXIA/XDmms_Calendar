<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $table = 'events';
    protected $fillable = [
        'event_name',
        'user_name',
        'company',
        'position',
        'description',
        'event_start',
        'event_end',
        'is_pass',
    ];
}
