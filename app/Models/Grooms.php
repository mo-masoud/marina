<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grooms extends Model {
	protected $fillable = [
		'name',
		'birthday',
		'identity',
		'phone',
		'order_id',
        'price',
        'approved',
        'identity_source'
	];

}
