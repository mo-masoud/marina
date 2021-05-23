@extends('layouts.app')

@section('content')
<div class="content bg">
    <div class="title wow fadeInDownBig">
        <i class="fa fa-user-circle-o"></i>
        <h1>{{ trans('front.login') }}</h1>
    </div>
    <div class="form-style">
        <form method="POST" action="{{ route('moderator-login') }}">
            @csrf
            <div class="col-md-6 col-xs-12 wow animation-div">
                <div class="form-group">
                    <label class="control-label"><i class="fa fa-envelope"></i>{{ trans('front.email_address') }}</label>
                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus maxlength="100" type="text"  placeholder="{{ trans('front.email_address') }}" required />
                    <i class="fa fa-envelope"></i>
                </div>

                 @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                @endif

            </div>
             <div class="col-md-6 col-xs-12 wow animation-div">
                <div class="form-group">
                    <label class="control-label"><i class="fa fa-lock"></i> {{ trans('front.password') }}</label>
                    <input id="password" maxlength="100" type="password" name="password" class="form-control" placeholder="{{ trans('front.password') }}" required />
                    <i class="fa fa-user"></i>
                    <span toggle="#password" class="fa fa-eye field-icon toggle-password"></span>
                </div>

                 @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

            </div>
            <div class="col-xs-12 wow animation-div">
                @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forget-password">{{ trans('front.forget_password') }}</a>
                 @endif

            </div>
             <div class="col-md-12 col-xs-12 wow fadeInDownBig">
                <div class="form-group">
                    <input type="submit" value="{{ trans('front.login') }}" class="nextPage" />
                </div>
            </div>
           
        </form>

    </div>
</div>

@endsection
@section('script')
    <script>
        $("#password").click(function () {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });

    </script>
@endsection