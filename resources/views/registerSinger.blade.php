@extends('layouts.app')

@section('content')

<div class="col-xs-12 wow fadeInDownBig">
    <div class="title">
        <i class="fa fa-user-circle-o"></i>
         <h1 class="border-grad">{{ trans('front.reg_new_singer') }}</h1>
    </div>
</div>
<div class="form-style">

    <form method="POST" action="{{ route('register') }}"  enctype="multipart/form-data">
       <input type="hidden" name="singer" value="singer">
       @csrf
        {{--  Name  --}}
        <div class="col-md-6 col-xs-12 wow animation-div">
            <div class="form-group">
                <label class="control-label">{{ trans('front.name') }}</label>
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="{{ trans('front.name') }}"  />
                <i class="fa fa-user"></i>
            </div>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong style="color:#C39438">{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        {{--  Password  --}}
        <div class="col-md-6 col-xs-12 wow animation-div">
            <div class="form-group">
                <label class="control-label">{{ trans('front.password') }}</label>
                <input  id="password-field" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required class="form-control" placeholder="{{ trans('front.password') }}" required />
                <i class="fa fa-lock"></i>
                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong style="color:#C39438">{{ $errors->first('password') }}</strong>
                </span>
            @endif

        </div>
        {{--  Confirm Password  --}}
        <div class="col-md-6 col-xs-12 wow animation-div">
            <div class="form-group">
                <label class="control-label">{{ trans('front.password_confirmation') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="{{ trans('front.password_confirmation') }}" required />
                <i class="fa fa-lock"></i>
                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>
        </div>
        {{--  Email  --}}
        <div class="col-md-6 col-xs-12 wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.email_address') }}</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="{{ trans('front.email_address') }}"  />
                <i class="fa fa-envelope"></i>
            </div>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong style="color:#C39438">{{ $errors->first('email') }}</strong>
                </span>
            @endif

        </div>
        {{--  Phone  --}}
        <div class="col-md-6 col-xs-12 wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.mobile') }}</label>
                <input type="number" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}"  class="form-control number" placeholder="{{ trans('front.mobile') }}" required />
                <i class="fa fa-phone"></i>
            </div>

            @if ($errors->has('phone'))
                <span class="invalid-feedback" role="alert">
                    <strong style="color:#C39438">{{ $errors->first('phone') }}</strong>
                </span>
            @endif
            
                    </div>
        {{--  National Id  --}}
        <div class="col-md-6 col-xs-12 wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">رقم الهوية</label>
                <input type="number" class="form-control{{ $errors->has('national_id') ? ' is-invalid' : '' }}" name="national_id" value="{{ old('national_id') }}"  class="form-control number" placeholder="رقم الهوية" required />
                <i class="fa fa-phone"></i>
            </div>


        </div>
        {{-- Image --}}
        <div class="col-md-6 col-xs-12  wow fadeInDownBig wow fadeInDownBig">
            <div class="form-group">
                <!--<label class="control-label">الصورة الشخصية</label>-->
                <label class="control-label"> إدراج الشعار</label>
                <input type="file" name="avatar"  required value="{{ orderdata('identity_image') }}" id="file-3" class="inputfile inputfile-2"
                data-multiple-caption="{count} files selected" multiple required/>
                <!--<label class="upload" for="file-3"><i class="fa fa-vcard"></i> <span>{{ trans('front.identity_image') }} </span> </label>-->
                <label class="upload" for="file-3"><i class="fa fa-vcard"></i> <span>إدراج الشعار </span> </label>
            </div>
        </div>
        {{-- Logo Image --}}
        <div class="col-md-6 col-xs-12  wow fadeInDownBig wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">ختم المطرب</label>
                <input type="file" name="logo"  required value="{{ orderdata('logo_image') }}" id="file-2" class="inputfile inputfile-2"
                data-multiple-caption="{count} files selected" multiple required/>
                <label class="upload" for="file-2"><i class="fa fa-vcard"></i> <span>ختم المطرب </span> </label>
            </div>
        </div>
        {{-- Birthday --}}
        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">تاريخ الميلاد</label>
                <input id="hijrDate" onclick="pickDate(event)" type="text" name="birthdate" value="{{ orderdata('birthdate') }}" class="w3-input w3-border" placeholder="yyy / mm / 01" required />
                <i class="fa fa-calendar"></i>
            </div>
        </div>
        {{--  Gender  --}}
        <div class="col-md-6 col-xs-12 wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.singer_gender') }}</label>
                    <select name="gender" id="gender">
                        <option value="0">مطرب</option>
                        <option value="1">مطربة</option>
                    </select>
                    <i class="fa fa-user"></i>
            </div>
        </div>
        {{--  Condition  --}}
        <div class="col-md-12 col-xs-12 wow fadeInDownBig">
            <div class="form-group allDone">
                <label class="checkB">{{ trans('front.iagree_terms') }}
                    <a href="" id="linkC"><i class="fa fa-exclamation-circle"></i> {{ trans('front.see_the_terms') }} </a>
                  <input type="checkbox" checked="checked" name="checkmark">
                  <span class="checkmark"></span>
                </label>
            </div>
        </div>
        {{--  Submit  --}}
        <div class="col-xs-12 wow fadeInDownBig">
            <div class="form-group">
                <input type="submit" class="nextPage" value="{{ trans('front.continue') }}" />
            </div>
        </div>

    </form>

</div>
    <script>
        var gender = document.getElementById('gender');
        var linkC = document.getElementById('linkC');
        linkC.setAttribute("href", "{{url('/register/condition/male')}}");
        
        gender.addEventListener('change',function(){
            if(gender.value == 0){
               linkC.setAttribute("href", "{{url('/register/condition/male')}}"); 
            }else{
                linkC.setAttribute("href", "{{url('/register/condition/female')}}");
            }
        });
    </script>
@endsection
