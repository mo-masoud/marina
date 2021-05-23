@extends('layouts.app')

@section('content')

<div class="logo wow fadeInDownBig">
        <img src="images/logo/logo.png" alt="" />
            <span class="text-grad"> {{ trans('front.site_title') }} </span>
        <img src="images/logo/text-logo.png" alt="" />
    </div>
    <div class="col-xs-12 wow fadeInDownBig">
        <div class="title other">
            <h1 class="border-grad">@lang('front.singers_andfemalesingers')</h1>
        </div>
    </div>
    <div class="choose-login wow fadeInDownBig">
        <a href="{{ url('register/login') }}" class="btn-style nextPage animation-div">@lang('front.singers_andfemalesingers_mangment')</a>
        <a href="{{url('moderator-login')}}" class="btn-style nextPage animation-div">@lang('front.singers_andfemalesingers_mangment_moderator')</a>
    </div>

@endsection
