<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address_line_one',
        'address_line_two',
        'city',
        'state',
        'zipcode',
        'table_type_id',
        'facility_type_id',
    ];

    public function events()
    {
        $this->belongsToMany(Event::class);
    }

    public function organization()
    {
        $this->belongsToMany(Organization::class);
    }
}
