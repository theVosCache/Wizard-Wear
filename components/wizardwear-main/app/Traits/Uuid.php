<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Uuid
{
    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public static function findByUuid($uuid)
    {
        return self::whereUuid($uuid)->first();
    }

    protected static function bootUuid(): void
    {
        static::retrieved(function ($model) {
            $model->makeHidden('id');
        });

        static::creating(function ($model) {
            $model->uuid = Str::uuid()->toString();
        });
    }
}
