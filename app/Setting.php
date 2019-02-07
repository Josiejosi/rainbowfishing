<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {

	public $timestamps = false ;

    protected $fillable = [

        'slot_one_start_time', 'slot_one_end_time', 'slot_two_start_time', 'slot_two_end_time',
        
    ];

}
