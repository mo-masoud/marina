<?php

namespace App\Http\Controllers;

use App\Models\Modrator;
use App\Models\Order;
use App\User;
use App\Models\Message;
use Illuminate\Http\Request;
use function Couchbase\defaultDecoder;

class ManagerController extends Controller {
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
      
        $moderators = Modrator::whereUserId(auth()->user()->id)->get();
        return view('moderator.index',compact('moderators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
                
        return view('moderator.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store() {

      $this->validate(request(),[
        'name' => 'required|string',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|confirmed',
        'additional_permssions' => 'required|array',
      ]);
    
    	$user = Modrator::create([
					'name'     => request('name'),
					'email'    => request('email'),
					'additional_permssions'    => json_encode(request('additional_permssions')),
					'password' => bcrypt(request('password')),
					'user_id' => auth()->user()->id,
        			
			]);


                return redirect('managers')->with('success',"تم اضافة مدير اعمال");

		  //return redirect('managers')->with('success', trans('user.moderator_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $moderator   = Modrator::find($id);
        return view('moderator.edit', compact('moderator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id) {

      $data = $this->validate(request(),[
        'name' => 'required|string',
        'email' => 'required|email|unique:users',
        'password' => 'sometimes|nullable|string',
        'additional_permssions' => 'required|array'
      ]);
     // dd(request()->password);
        $data['user_id'] = auth()->user()->id;
      $data['additional_permssions'] = json_encode(request('additional_permssions'));
      
      if(isset(request()->password)){
        $data['password'] = bcrypt(request('password'));
      }else
          unset($data['password']);
//dd($data);

    	$user = Modrator::where('id', $id)->update($data);
      
      session()->flash('success', trans('front.updated_record'));
      return redirect('managers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $Modrator = Modrator::find($id);
    
        $messages_to=Message::where("receiver_model",1)->where('to',$id)->pluck('id')->toArray();
            $messages_from=Message::where("sender_model",1)->where('from',$id)->pluck("id")->toArray();
        
       
         if(isset($messages_to)||isset($messages_from))
         
         {
            
            Message::destroy($messages_to);
            
              Message::destroy($messages_from);
         }
        //  dd($messages_to);
      
        $Modrator->delete();
        session()->flash('success', trans('front.deleted_record'));
        return redirect('managers');
    }
  
  
}