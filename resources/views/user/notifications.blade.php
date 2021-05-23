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
