@extends('layouts.app')

@section('content')

<div class="logo singer wow fadeInDownBig" style="visibility: visible;">
  <img src="images/singer.png" alt="">
      <span class="text-grad">{{ trans('front.site_title') }} </span>
    <img src="{{ url('images/logo/text-logo.png') }}" alt="">
</div>
<div class="choose-login">
  <a href="{{ url('booking/marina') }}" class="btn-style nextPage animation-div">{{ trans('front.booking') }}</a>
  <a href="{{ url('contract') }}" class="btn-style nextPage animation-div">{{ trans('front.edit') }}</a>
    <a href="{{ url('contract/print') }}" class="btn-style nextPage animation-div">{{ trans('front.print') }}</a>
</div>

@endsection
