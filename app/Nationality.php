<?php

namespace App;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;
class Nationality extends Model
{

    use Translatable;
	protected $translatable = ['name'];
	

}