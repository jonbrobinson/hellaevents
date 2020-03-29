<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'handle',
        'account_id',
        'api_key',
        'api_secret',
        'social_account_type_id',
    ];

    public function organizations()
    {
        return $this->belongsToMany(Organization::class);
    }

    public function socialAccountType()
    {
        return $this->belongsTo(SocialAccountType::class);
    }
}
