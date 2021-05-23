@extends('layouts.app')

@section('content')
        @if(Auth::user()->role_id == 4)
        
    <div class="logo singer wow fadeInDownBig">
        @if(Auth::user()->avatar != null)
        <img src="{{url('storage/'.Auth::user()->avatar)}}" alt="" />
        @endif
        {{-- <span class="text-grad">فـرقــة مــاريـنـــا الـغــربـيـــة</span>
        <img src="images/logo/text-logo.png" alt="" />
    </div>
    
    @else
    <div class="logo wow fadeInDownBig">
        <img src="images/logo/logo.png" alt="" />
            <span class="text-grad">فـرقــة مــاريـنـــا الـغــربـيـــة</span>
        <img src="images/logo/text-logo.png" alt="" />
    </div>
    --}}
    @endif
    <div class="col-xs-12 wow fadeInDownBig">
        <div class="title other">
            <h1 class="border-grad">الرسائل والمحادثات</h1>
        </div>
    </div>
    <div class="choose-login wow fadeInDownBig">
        <a href="{{ url('/messages/management') }}" class="btn-style nextPage animation-div">محادثه مع الإدارة</a>
        <a href="{{ url('/messages/singer_manager') }}" class="btn-style nextPage animation-div">محادثه مع مدير الأعمال</a>
        <a href="{{ url('/messages/client') }}" class="btn-style nextPage fadeInDownBig">محادثه مع العميل</a>
    </div>


@endsection
