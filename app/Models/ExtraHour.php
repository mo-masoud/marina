<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class ExtraHour extends Model {

    protected $table = 'Extra_Hours';
    protected $guarded = [];
    public $timestamp=true;
}