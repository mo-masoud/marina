@extends('layouts.app')

@section('content')
<div class="col-xs-12 wow fadeInDownBig" style="visibility: visible;">
    <div class="title title-singer">
        <h1 class="border-grad"> 
            <!--@if($singer->gender == 0)-->
            <!--    اسم المطرب-->
            <!--@else-->
            <!--    اسم المطربة-->
            <!--@endif-->
            
            {{$singer->name}}
         </h1>
    </div>
</div>

<div class="form-style animation-fast">
    <div class="col-md-12 col-xs-12  wow animation-div" style="visibility: visible;">
        <div class="singer-img">
            <img src="{{ Voyager::image( $singer->avatar )}}" alt="{{ $singer->name }}">
        </div>
    </div>

    <div class="col-xs-12 wow animation-div" style="visibility: visible;">
    	<a href="{{ url('singer/choose/'.$singer->id ) }}" class="nextPage">{{ trans('front.join') }}</a>
    </div>
</div>

@endsection