@extends('layouts.app')

@section('header')

 <span>فـرقــة مــاريـنـــا الـغــربـيـــة</span>

@endsection

@section('content')

<div class="content-new">
    <div class="choose-login wow fadeInDownBig padding">
      
        @if($notifications->count() > 0)
            @foreach($notifications as $notification)
            
                <div class="col-xs-12">
                    <div class="notifiction">
                        <div class="icon"><i class="fa fa-bell"></i></div>
                        <div class="text">
                            <h3>اشعار من الاداره</h3>
                            <p>{{ $notification->description }}</p>
                            
                            <p>{{ $notification->created_at->diffForHumans()  }}</p>
                            
                            <a onclick="delete_notifcation('{{$notification->id}}')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div>
    
            @endforeach
        @else
            <p style="color: #fff;">{{ trans('front.no_notifications_found') }}</p>
        @endif
        
    </div>
</div>

@endsection

<script>
    
            function delete_notifcation(id){
            if(confirm("هل انت متأكد من حذف البيانات")){
                $.ajax({
                    url : '{{url('/')}}/notifcation/delete/'+id,
                    type : "GET",
                    data : {'_method' : 'GET', '_token' : $('meta[name=csrf-token]').attr('content')},
                    success : function(data){
                        window.location.reload();
                        alert( 'تم الحذف بنجاح');
                    },
                    error : function(){
                       alert( 'لا يمكن الوصول للبيانات !');

                    }
                });
            }
        }
        
</script>