<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{

	protected $dates = [ 'matures_at', 'block_at', ] ;
	
    protected $fillable = [

        'status', 'amount', 'user_id', 'sender_id', 'is_matured', 'matures_at', 'block_at',
        
    ];

    public function user() {

        return $this->belongsTo( User::class ) ;
        
    }

}
