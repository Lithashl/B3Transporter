<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'request_pickup_id',
        'message',
        'role',
    ];
}
