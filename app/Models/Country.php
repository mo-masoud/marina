<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Country extends Model {

	use Translatable;
	protected $translatable = ['name'];

	public function Orders(){
		return $this->hasMany('App\Models\Order');
	}
	
	public function states(){
		return $this->hasMany('App\Models\State');
	}
}