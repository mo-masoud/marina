<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class City extends Model {

	use Translatable;
	protected $translatable = ['name'];

	protected $fillable = [
		'name',
		'country_id',
	];

	public function state() {
		return $this->belongsTo('App\Models\State');
	}

	public function Orders(){
		return $this->hasMany('App\Models\Order');
	}

}