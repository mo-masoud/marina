@extends('layouts.app')

@section('content')

<div class="col-xs-12 wow fadeInDownBig">
    <div class="title">
        <i class="fa fa-user-circle-o"></i>
        <h1 class="border-grad">{{ trans('front.confirm_code') }}</h1>
    </div>
</div>
<div class="form-style">

    <!--<div class="temp-code"><label class="control-label">{{ $userdata['code'] }}</label></div>-->

     <form method="POST" action="{{ url('step5') }}">
       @csrf

        <div class="col-md-6 col-xs-12 wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.enter_code') }}</label>
                <input maxlength="100" type="text" name="sender_code" class="form-control" placeholder="{{ trans('front.enter_code') }}" required />
                <i class="fa fa-check-circle"></i>
                                    <!--<a href="{{url('/resend/personal')}}"><i class="fa fa-refresh"></i> اعد إرسال الكود</a></span>-->
                <span class="small-text"><i class="fa fa-exclamation-circle"></i>  ادخل رمز التحقق المرسل عبر جوالك
                    <a href="{{url('/resend/personal')}}"><i class="fa fa-refresh"></i> اعد إرسال الكود</a></span>
            </div>
        </div>

        <div class="col-xs-12 wow fadeInDownBig">
            <div class="form-group">
                <input type="submit" class="nextPage" value="{{ trans('front.continue') }}" />
            </div>
        </div>
    </form>
</div>

@endsection
