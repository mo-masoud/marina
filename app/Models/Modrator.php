<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use App\User;
class Modrator extends \TCG\Voyager\Models\User {
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'additional_permssions' , 'password','user_id',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];


	public function userAvatar($id){

	 return  User::find($id)->avatar;

}
   public function getCreatedAtAttribute($value) {
     return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$value)->diffForHumans();
  }

  public function getUpdatedAtAttribute($value){
     return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$value)->diffForHumans();
  }  


}
