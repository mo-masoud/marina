<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\conditionMsingerClient ;
use App\conditionFsingerClient ;
use App\conditionMsingerCompany ;
use App\conditionFsingerCompany ;
class User extends \TCG\Voyager\Models\User {
	use Notifiable;
    public $additional_attributes = ['male-singer_name','female-singer_name'];
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'gender' , 'password','role_id','phone','avatar','birthdate','national_id','approved','logo','seal'];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];


        public static function boot()
        {
            parent::boot();
    
            static::creating(function ($user){
                if(session('singer_type') == 0 || session('singer_type') == 1 ){
                    $user->gender = session('singer_type');
                    $user->role_id = 4;
                    $user->provided_by_marina = 1;
                }
                if(session('singer_type') != 10  ){

                    if(!request()->email){
                                    $user->email = 'email'.rand(1,0).rand(10,99).rand(44,88).'@email.com';
                    }
                
                }
                
                
                
            });
        }



	public function scopeCurrentUser($query) {

		if (auth()->user()->hasRole('singer')) {
			return $query->where('role_id', 2)->where('singer_id', auth()->user()->id);
		} else {
			return $query;
		}

	}

	public function roles() {
		return $this->belongsTo('\TCG\Voyager\Models\Role', 'role_id', 'id');
	}

	public function conditionFsingerClient()
	{
		return $this->hasMany(conditionFsingerClient::class);
	}

	public function conditionMsingerClient()
	{
		return $this->hasMany(conditionMsingerClient::class);
	}

	public function conditionFsingerCompany()
	{
		return $this->hasMany(conditionFsingerCompany::class);
	}

	public function conditionMsingerCompany()
	{
		return $this->hasMany(conditionMsingerCompany::class);
	}

	public function getMaleSingerNameAttribute(){
		if($this->gender == 0 && $this->role_id == 4)
        return $this->name;
    }

	public function getFemaleSingerNameAttribute(){
		if($this->gender == 1  && $this->role_id == 4)
        return $this->name;
	}
	
}
