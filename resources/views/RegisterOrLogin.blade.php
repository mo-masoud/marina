@extends('layouts.app')

@section('content')
<div class="content">
    <div class="logo wow fadeInDownBig" style="visibility: visible;">
      <img src="images/logo/logo.png" alt="">
          <span class="text-grad">@lang('front.site_title')</span>
        <img src="images/logo/text-logo.png" alt="">
    </div>
    <div class="col-xs-12 wow fadeInDownBig" style="visibility: visible;">
        <div class="title other">
          <h1 class="border-grad">@lang('front.singers_andfemalesingers')</h1>
        </div>
    </div>
    <div class="choose-login wow fadeInDownBig" style="visibility: visible;">
      <a href="{{url('login/singer')}}" class="btn-style nextPage animation-div">@lang('front.joint')</a>
      <a href="{{url('register/singer')}}" class="btn-style nextPage animation-div">@lang('front.Not joint') </a>
    </div>
</div>

@endsection