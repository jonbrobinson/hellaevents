<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'url',
        'events',
        'online_event',
        'time_start',
        'time_end',
    ];

    public function address()
    {
        $this->belongsToMany(Address::class);
    }
}
