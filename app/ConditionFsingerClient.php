<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use TCG\Voyager\Traits\Translatable;

class ConditionFsingerClient extends Model
{
    use Translatable;
    protected $translatable = ['condition'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
