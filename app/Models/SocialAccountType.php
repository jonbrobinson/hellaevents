<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialAccountType extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'code',
        'url',
    ];

    public function socialAccount()
    {
        return $this->hasMany(SocialAccount::class);
    }
}
