<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
	
    protected $fillable = [

        'status', 'amount', 'user_id', 'sender_id', 'is_matured', 'matures_at',
        
    ];

    public function user() {

        return $this->belongsTo( User::class ) ;
        
    }

}
