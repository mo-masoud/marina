<?php

namespace App\Http\Controllers;
use http\Url;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Message;
use App\User;
use App\Models\Modrator;
use App\Models\Order;
use Auth;
use Activity;
use Mail;
use Illuminate\Support\Facades\Session;
class MessageController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        //$messages = Message::with('sender' , 'reciever')->paginate(5);
        //$patient = User::whereId(Auth::user()->id)->firstOrFail();
        //$doctorpatient = User::whereId($patient->doctor_id)->first();
        return view('message.index');
    }

    public function list($name=null)
    {
        
       // dd($name);
        switch ($name) {
            case 'management':
                $users = User::whereRoleId(1)->get();
                return view('message.list', compact('users','name'));
                break;
            case 'client':
                // To Contact With Only Clients Contracted With
                $orders = Order::where('singer_id',Auth::user()->id)->pluck('user_id')->toArray();
                $users = User::whereRoleId(2)->whereIn('id',$orders)->get();
                
                
                return view('message.list', compact('users','name'));
                break;
            case 'singer_manager':

                $users = Modrator::where('user_id',Auth::user()->id)->get();
                $message_model = 'moderator';
                return view('message.list', compact('users','name','message_model'));
                break;
                
                
                case 'singer':
                    
                $users = User::where('id',Auth::user()->user_id)->get();
                
                $message_model = 'singer';
                return view('message.list', compact('users','name','message_model'));
                break;
                
                
            default:
                return view('message.index');
                break;
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function messageform(Request $request)
    {
     

       $sender = Auth::User()->name;
        if(request('message_model') == 'user'){
              $reciever = User::FindOrFail($request->get('user_id'));
        }else{
          $reciever = Modrator::FindOrFail($request->get('user_id'));
        }

   
        return view('message.create' , compact('sender','reciever'));
    }


    public function messageform_manger(Request $request,$id)
    {
            
            $reciever = User::findOrFail($id);
            
          $sender = Auth::User()->name;
        
   
        return view('message.create' , compact('sender','reciever'));
    }
    





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        

        
             
              //send_mail("message",'vavage5981@nonicamy.com');
        
                
         $message = new Message(array(

         'from' => Request('from'),
         'to'   => request('to'),
         'subject' => request('subject'),
         'sender_model'=>request('sender_model'),
        'receiver_model'=>request('receiver_model'),
         'message' => request('message'),
         'message_model' => request('message_model') ? request('message_model'):'user',
 
          ));

          $message->save();
          $title = request('subject');
          $content = request('message');
          
          if($request->to != null){
         $target = User::find($request->to);
            
         }
         if($target == null){
             
             $target = Modrator::find($request->to);
             
         }
            
             
         
        //  $send_email = Mail::send(new Message_test(), ['title' => $title, 'content' => $content , 'target' => $target], function ($message) use ($target)
        //   {
        //       $message->from(Auth::user()->email, Auth::user()->user_name);
        //     //   $message->to($target->email);
            
        //     $message->to('juko2050@gmail.com');

        //   });
           
        //   dd($send_email);
      
        $data = ['title' => $title, 'content' => $content , 'target' => $target];
            send_mail($target->email,$data);
            if($target->role_id == 2){
         send_sms(request('message'),$target->phone);
            }
      
          $notification = array(
                'message' => 'A New Message From '.Auth::user()->user_name.' sent to '.$target->user_name, 
                'alert-type' => 'info'
           );
          
           //Activity::log('A New Message From '.Auth::user()->user_name.' sent to '.$target->user_name);

          return redirect()->back()->with('success', 'تم إرسال الرسالة بنجاح');

    }
    
    public function MyMessages()
    {

        $moderator=false;
        if(!User::find(auth()->id())) {
       // auth()->user()->id = auth()->user()->user_id;
        $moderator=true;
    }
       // dd(auth()->user()->id);
        $inboxs = Message::where('to',auth()->user()->id)->get();
         $mysent = Message::where('from',auth()->user()->id)->get();
/*foreach($mysent as $m)
    echo $m->sender->name;*/

//dd($mysent);
       return view('message.mymessages', compact('inboxs','mysent','moderator'));
    }
  
    public function show($id)
    {
      //  dd('y');
        $moderator=false;
        if(!User::find(auth()->id())) {
            auth()->user()->id = auth()->user()->user_id;
            $moderator=true;}
         $message = Message::where('id',$id)->firstOrFail();
         return view('message.show', compact('message','moderator'));
    }

}