<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Base
{
    use HasFactory;

    protected $guarded = ['created_at'];
}
