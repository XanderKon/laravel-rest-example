<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    public const ISO8601_FORMAT = 'datetime:Y-m-d\TH:i:sP';
    protected $dateFormat = 'Y-m-d H:i:sP';

    protected $casts = [
        'created_at' => self::ISO8601_FORMAT,
        'updated_at' => self::ISO8601_FORMAT,
    ];
}
