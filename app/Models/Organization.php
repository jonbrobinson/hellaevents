<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'email',
        'website',
        'phone',
        'address_id',
    ];

    protected $appends = ['domain'];

    public function socialAccounts()
    {
        return $this->belongsToMany(SocialAccount::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function getDomainAttribute()
    {
        $website = $this->website;
        $url = substr($website, 0, 4) == 'http' ? $website : 'http://'.$website;
        $d = parse_url($url);
        $tmp = explode('.', $d['host']);
        $n = count($tmp);
        if ($n >= 2) {
            if ($n == 4 || ($n == 3 && strlen($tmp[($n - 2)]) <= 3)) {
                $d['domain'] = $tmp[($n - 3)].'.'.$tmp[($n - 2)].'.'.$tmp[($n - 1)];
                $d['domainX'] = $tmp[($n - 3)];
            } else {
                $d['domain'] = $tmp[($n - 2)].'.'.$tmp[($n - 1)];
                $d['domainX'] = $tmp[($n - 2)];
            }
        }

        return $d['domain'];
    }
}
