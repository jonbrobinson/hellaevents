<?php

namespace App\Traits;

use Webpatser\Uuid\Uuid;

trait Uuids
{
    protected static function bootUuids()
    {
        static::creating(function ($model) {
            $keyName = $model->getKeyName();

            $model->{$keyName} = Uuid::generate(4)->string;
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
}
