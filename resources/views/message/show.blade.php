@extends('layouts.app')

@section('content')
<div class="tabs-style animation-div">
     <div class="col-xs-12">
        <div class="notifiction">
            <div class="icon"><i class="fa fa-bell"></i></div>
            <div class="text">
                <span>{{ trans('front.to') }} : {{ $message->receiver_model==1?\App\Models\Modrator::find($message->to)->name:\App\User::find($message->to)->name}}</span>

<br>
                <span>{{ trans('front.from') }} : {{ $message->sender_model==1?\App\Models\Modrator::find($message->from)->name:\App\User::find($message->from)->name}}</span>
                <h3>{{ $message->subject }}</h3>
                <p>{{ $message->message }}</p>
            </div>
        </div>
    </div>
</div>

@endsection