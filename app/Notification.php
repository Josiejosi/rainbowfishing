<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model {

    protected $fillable = [
        'message', 'is_viewed', 'user_id',
    ];

}
