<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
	
    protected $fillable = [
        'name', 'email', 'password', 'role', 'is_active', 'is_blocked',
    ];

}
