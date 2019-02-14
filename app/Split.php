<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Split extends Model {

    protected $fillable = [

        'status', 'amount', 'receiver_id', 'sender_id', 'order_id', 'is_matured', 'matures_at', 'block_at',
        
    ] ;
    
}
