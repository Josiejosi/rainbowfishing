<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model {

	public $timestamps = false ;

    protected $fillable = [
        'bank', 'account_holder', 'account_number', 'branch_code', 'branch_number', 'user_id',
    ];

}
