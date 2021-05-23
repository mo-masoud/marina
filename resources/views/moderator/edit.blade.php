@extends('layouts.app')

@section('content')
 <div class="col-xs-12 wow fadeInDownBig">
      <!--<div class="title title-singer">-->
      <!--    <ul>-->
      <!--    	<li><img src="images/singer.png" alt="" /></li>-->
      <!--        <li><img src="images/singer-icon.png" alt="" /></li>-->
      <!--    </ul>-->


    @php
         $avatar=auth()->user()->avatar;
     @endphp



     <div class="logo singer title title-singer">
         <img src="{{url('storage/'.Auth::user()->avatar)}}" alt="" />
     <!-- <div class="logo singer title title-singer">
        <img src="images/singer.png" alt="" />-->
          <h1 class="border-grad">تعيين المدراء</h1>
      </div>
  </div>
  <div class="form-style animation-fast">
  <form action="{{route('managers.update',$moderator->id)}}" method="POST">
      @csrf
      <input type="hidden" name="_method" value="PUT">
      <div class="col-md-6 col-xs-12  wow fadeInDownBig">
      
         <div class="form-group">
                <label class="control-label">{{ trans('front.name') }}</label>
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $moderator->name }}" required autofocus placeholder="{{ trans('front.name') }}"  />
                <i class="fa fa-user"></i>
           
           @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

      </div>
    
       <div class="col-md-6 col-xs-12 wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.email_address') }}</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $moderator->email }}" required placeholder="{{ trans('front.email_address') }}"  />
                <i class="fa fa-envelope"></i>
            </div>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

        </div>

      <div class="col-md-6 col-xs-12  wow fadeInDownBig">
         <div class="form-group">
                <label class="control-label">{{ trans('front.password') }}</label>
                <input  id="password-field" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  class="form-control" placeholder="{{ trans('front.password') }}"  />
                <i class="fa fa-lock"></i>
                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
         </div>
        

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
      </div>


      <div class="col-xs-12 padding singer-choose wow fadeInDownBig">
          <div class="col-xs-12">
              <label class="control-label gold">الصلاحيات </label></label>
          </div>
        <div class="col-md-6 col-xs-12 wow fadeInDownBig">
              <div class="form-group">
                  <label class="checkB"> 
                    
                    <input type="checkbox" name="additional_permssions[allow_booking]" 
                           @if( array_key_exists('allow_booking',json_decode($moderator->additional_permssions)) ) {{ 'checked="checked"' }} @endif >
                    <span> الطباعه </span>
                    <span class="checkmark"></span>
                  </label>
              </div>
          </div>
          <div class="col-md-6 col-xs-12 wow fadeInDownBig" >
              <div class="form-group">
                  <label class="checkB">
                    <input type="checkbox" name="additional_permssions[allow_close]" 
                            @if( array_key_exists('allow_close',json_decode($moderator->additional_permssions)) ) {{ 'checked="checked"' }} @endif>
                    <span> الحذف </span>
                    <span class="checkmark"></span>
                  </label>
              </div>
          </div>
          <div class="col-md-6 col-xs-12 wow fadeInDownBig">
              <div class="form-group">
                  <label class="checkB">
                    <input type="checkbox" name="additional_permssions[allow_edit]" 
                           @if( array_key_exists('allow_edit',json_decode($moderator->additional_permssions)) ) {{ 'checked="checked"' }} @endif>
                    <span> التعديل على العقود </span>
                    <span class="checkmark"></span>
                  </label>
              </div>
          </div>
          <div class="col-md-6 col-xs-12 wow fadeInDownBig">
              <div class="form-group">
                  <label class="checkB">
                    <input type="checkbox" name="additional_permssions[allow_message]" 
                           @if( array_key_exists('allow_message',json_decode($moderator->additional_permssions)) ) {{ 'checked="checked"' }} @endif>
                    <span> إرسال رسائل النصيحة </span>
                    <span class="checkmark"></span>
                  </label>
              </div>
          </div>
          {{--<div class="col-md-6 col-xs-12 wow fadeInDownBig">
              <div class="form-group">
                  <label class="checkB">
                    <input type="checkbox" name="additional_permssions[allow_voice]" 
                          @if( array_key_exists('allow_voice',json_decode($moderator->additional_permssions)) ) {{ 'checked="checked"' }} @endif>
                    <span> السماح له بالدردشه الصوتيه </span>
                    <span class="checkmark"></span>
                  </label>
              </div>
          </div>
    --}}
           @if ($errors->has('additional_permssions'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('additional_permssions') }}</strong>
                </span>
           @endif
      </div>


      <div class="col-xs-12 wow fadeInDownBig ">
        <div class="form-group">
            <input type="submit" class="nextPage" value="تسجيل" />
          </div>
      </div>
  </form>

</div>
@endsection