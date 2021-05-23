@extends('layouts.app')

@section('content')

<div class="col-xs-12 wow fadeInDownBig">
    <div class="title title-singer">
        	<div class="singer-img">
    	<img src="{{ Voyager::image( session('singer')->avatar )}}" alt="{{ session('singer')->name }}">
    </div>

        @if($singer->gender == 1)
          <h1 class="border-grad"> {{ trans('front.order_from_singer_female_personal') }} </h1>
        @else
         <h1 class="border-grad"> {{ trans('front.order_from_singer_personal') }} </h1>
        @endif
        
       
    </div>
</div>

<div class="form-style animation-fast">

    <form action="{{ url('/booking/singer/step1') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-6 col-xs-12  wow animation-div">
            <div class="form-group">
                <label class="control-label">{{ trans('front.appropriate_type') }}</label>
                <div class="select">
                    <select name="occasion_id">

                        @foreach(Occasions() as $Occasion )
                          <option value="{{ $Occasion->id }}"  {{ ( orderdata('occasion_id') == $Occasion->id  ) ? 'selected' :'' }}>
                                {{ $Occasion->getTranslatedAttribute('name', session('lang') ) }}
                        </option>
                        @endforeach

                    </select>
                    <i class="fa fa-viadeo"></i>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xs-12 wow animation-div">
            <div class="form-group popover-markup">
                <div class="trigger">
                    <label class="control-label" >{{ trans('front.number_bridal') }}</label>
                    <input type="number" id="passengers" name="number_bridal" class="form-control" value="{{ orderdata('number_bridal') }}" />
                </div>
                <div class="content hide">
                    <div class="form-group">
                         <div class="input-group number-spinner col-md-7">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-danger" data-dir="dwn"><span class="fa fa-minus"></span></button>
                            </span>
                            <input type="text" class="form-control text-center enter" value="1" max=9 min=0 disabled />
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info" data-dir="up"><span class="fa fa-plus"></span></button>
                            </span>
                        </div>
                    </div>
                    <button type="button" class="btn btn-default btn-block demise">{{ trans('front.select') }}</button>
                </div>
                <i class="fa fa-male lefti"></i>
            </div>
        </div>

        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.name_bridal') }}</label>
                <input maxlength="100" type="text" name="name_bridal" value="{{ orderdata('name_bridal') }}" class="form-control" placeholder="الاسم " required />
                <i class="fa fa-user"></i>
            </div>
        </div>

        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.identity_number') }}</label>
                <input maxlength="100" type="text" name="identity" value="{{ orderdata('identity') }}" class="form-control" placeholder="{{ trans('front.identity_number') }}" required />
                <i class="fa fa-vcard"></i>
            </div>
        </div>

        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.birthday') }}</label>
                <input maxlength="100" type="text" name="birthday" value="{{ orderdata('birthday') }}" placeholder="yyy / mm / 01" class="form-control birthday"  required />
                <i class="fa fa-birthday-cake"></i>
            </div>
        </div>

        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.nationality') }}</label>
                <div class="select">
                    <select name="nationality">
                        @foreach($nationalities as $nationality)
                        <option value="{{$nationality->id}}" {{ ( orderdata('nationality') == $nationality->id  ) ? 'selected' :'' }} > {{$nationality->name}}</option>
                        @endforeach
                    </select>
                    <i class="fa fa-vcard"></i>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.identity_source') }}</label>
                <input maxlength="100" type="text" value="{{ orderdata('identity_source') }}" name="identity_source" class="form-control" placeholder="مصدر الهوية" required />
                <i class="fa fa-map-marker"></i>
            </div>
        </div>

        <div class="col-md-6 col-xs-12  wow fadeInDownBig wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.identity_image') }} </label>
                <input type="file" name="identity_image"  value="{{ orderdata('identity_image') }}" id="file-3" class="inputfile inputfile-2"
                data-multiple-caption="{count} files selected" multiple />
                <label class="upload" for="file-3"><i class="fa fa-vcard"></i> <span>{{ trans('front.identity_image') }} </span> </label>
            </div>
        </div>

        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.email_address') }}</label>
                <input maxlength="100" name="email_address" value="{{ orderdata('email_address') }}" type="email" class="form-control" placeholder="{{ trans('front.email_address') }}" required />
                <i class="fa fa-envelope"></i>
            </div>
        </div>

        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.phone_bridal') }}</label>
                <input maxlength="100" type="text" name="phone_bridal" value="{{ orderdata('phone_bridal') }}" class="form-control" placeholder="{{ trans('front.phone_bridal') }}" required />
                <i class="fa fa-mobile"></i>
            </div>
        </div>

        <div class="col-md-6 col-xs-12  wow fadeInDownBig" style="display:none;">
            <div class="form-group">
                <label class="control-label">{{ trans('front.singer_gender') }}</label>
                <div class="select">
                    <select id="type" name="singer_gender">
                        <option value="female" {{ $singer->gender == 1   ? 'selected' :'' }}>@lang('front.femaleSinger')</option>
                        <option value="male"   {{  $singer->gender == 0   ? 'selected' :'' }}>@lang('front.maleSinger')</option>
                    </select>
                    <i class="fa fa-microphone"></i>
                </div>
            </div>
        </div>
        @if($singer->gender == 1)
        <div class="col-xs-12 padding types wow fadeInDownBig" id="female">
            <div class="col-md-6 col-xs-12 ">
                <div class="form-group">
                    <label class="control-label">{{ trans('front.singer_name_female') }}</label>
                    <select name="singer_female_id" disabled="disabled">
                        <option selected>@lang('front.name')</option>
                        @foreach($females as $female)
                            <option value="{{ $female->id }}" {{ $singer->id ==  $female->id   ? 'selected' :'' }}>{{ $female->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6 col-xs-12  wow fadeInDownBig">
                <div class="form-group">
                    <label class="control-label">{{ trans('front.singer_name_optional_female') }} </label>
                    <input maxlength="100" type="text" name="singer_name_optional_female" value="{{ orderdata('singer_name_optional_female') }}" class="form-control" placeholder="{{ trans('front.singer_name_optional_female') }}" />
                    <i class="fa fa-microphone"></i>
                </div>
            </div>
        </div>
        @else
        <div class="col-xs-12 padding types wow fadeInDownBig" id="male">
            <div class="col-md-6 col-xs-12 ">
                <div class="form-group">
                    <label class="control-label">{{ trans('front.singer_name_male') }}</label>
                    <select name="singer_male_id" disabled="disabled">
                        <option selected disabled="disabled">@lang('front.name')</option>
                        @foreach($males as $male)
                            <option value="{{ $male->id }}" {{ $singer->id ==  $male->id   ? 'selected' :'' }}>{{ $male->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

                     <div class="col-md-6 col-xs-12  wow fadeInDownBig">
                <div class="form-group">
                    <label class="control-label">{{ trans('front.singer_name_optional_male') }} </label>
                    <input maxlength="100" type="text" name="singer_name_optional_male" value="{{ orderdata('singer_name_optional_male') }}" class="form-control" placeholder="{{ trans('front.singer_name_optional_male') }}" />
                    <i class="fa fa-microphone"></i>
                </div>
            </div>
        </div>
        @endif
        <div class="col-xs-12 padding singer-choose wow fadeInDownBig">
            <div class="col-xs-12">
                <label class="control-label gold">{{ trans('front.carol_type') }}</label>
            </div>
            <div class="col-md-6 col-xs-6 ">
                <div class="form-group">
                    <label class="checkB">
                      <input type="checkbox" class="carol_type" {{ ( orderdata('carol_type') == trans('front.carol_male') ) ? 'checked' : '' }} name="carol_type" value="{{ trans('front.carol_male') }}">
                      <span><i class=" fa fa-microphone"></i>{{ trans('front.carol_male') }}</span>
                      <span class="checkmark"></span>
                    </label>
                </div>
            </div>
            <div class="col-md-6 col-xs-6  wow fadeInDownBig">
                <div class="form-group">
                    <label class="checkB">
                      <input type="checkbox" class="carol_type" {{ ( orderdata('carol_type') == trans('front.carol_female')  ) ? 'checked' : '' }} name="carol_type" value="{{ trans('front.carol_female') }}">
                      <span><i class=" fa fa-microphone"></i>{{ trans('front.carol_female') }}</span>
                      <span class="checkmark"></span>
                    </label>
                </div>
            </div>
        </div>

        <hr />

     <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.hejry_date') }}</label>
                <input maxlength="100" type="text" name="hejry_date" value="1441/01/01"  placeholder="yyy / mm / 01" class="form-control birthday"  required />
                <i class="fa fa-birthday-cake"></i>
            </div>
        </div>
        
           <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.meladi_date') }}</label>
                <input maxlength="100" type="text" name="date"   placeholder="yyy / mm / 01" class="form-control birthday"  required />
                <i class="fa fa-birthday-cake"></i>
            </div>
        </div>
        
        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">اليوم</label>
                <div class="select">
                    <select name="day">
                        <option>السبت</option>
                        <option>الاحد</option>
                        <option>الاثنين</option>
                        <option>الثلاثاء</option>
                        <option>الاربعاء</option>
                        <option>الخميس</option>
                        <option>الجمعه</option>
                    </select>
                    <i class="fa fa-calendar"></i>
                </div>
            </div>
        </div>
        

        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
        {{--<div class="form-group">
                <label class="control-label">{{ trans('front.hotel_name') }}</label>
                <div class="select">
                    <select name="hotel_name">
                        <option value="hotel1" {{ ( orderdata('hotel_name') == 'hotel1'  ) ? 'selected' :'' }}>إسم التجريبي للفندق</option>
                        <option value="hotel2"{{ ( orderdata('hotel_name') == 'hotel2'  ) ? 'selected' :'' }}>إسم التجريبي للفندق</option>
                        <option value="hotel3" {{ ( orderdata('hotel_name') == 'hotel3'  ) ? 'selected' :'' }}>إسم التجريبي للفندق</option>
                    </select>
                    <i class="fa fa-building-o"></i>
                </div>
            </div>--}}
            
            <div class="form-group">
                <label class="control-label">{{ trans('front.hotel_name') }}</label>
                <input maxlength="100" type="text" name="hotel_name" value="{{ orderdata('hotel_name') }}" class="form-control" placeholder="{{ trans('front.hotel_name') }}" required />
                <i class="fa fa-building-o"></i>
            </div>
        </div>

        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
        {{--<div class="form-group">
                <label class="control-label">{{ trans('front.halls') }}</label>
                <div class="select">

                    <select name="hall_id">

                        @foreach(halls() as $hall )

                        <option value="{{ $hall->id }}" {{ ( orderdata('hall_id') ==  $hall->id  ) ? 'selected' :'' }}>
                            {{ $hall->getTranslatedAttribute('name', session('lang') ) }}
                        </option>

                        @endforeach
                    </select>

                    <i class="fa fa-video-camera"></i>
                </div>
            </div>--}}
        
            <div class="form-group">
                <label class="control-label">{{ trans('front.halls') }}</label>
                <input maxlength="100" type="text" name="hall_id" value="{{ orderdata('hall_id') }}" class="form-control" placeholder="{{ trans('front.halls') }}" required />
                <i class="fa fa-video-camera"></i>
            </div>    
        </div>

        <div class="col-md-12 col-xs-12  wow fadeInDownBig">
            <span class="small-text margin"><i class="fa fa-clock-o"></i> {{ trans('front.time_of_start') }}</span>
        </div>

        <div class="col-md-6 col-xs-6  wow fadeInDownBig">
            <div class="form-group">
                <label class="small-label">{{ trans('front.from') }}</label>
                <input id="timepicker1" type="text"  value="{{ orderdata('start_time') }}" name="start_time" class="form-control" placeholder="{{ trans('front.from') }}" required />
            </div>
        </div>

        <div class="col-md-6 col-xs-6  wow fadeInDownBig">
            <div class="form-group to">
                <label class="small-label">{{ trans('front.to') }}</label>
                <input id="timepicker2" type="text" name="end_time" value="{{ orderdata('end_time') }}"  class="form-control" placeholder="{{ trans('front.to') }}" required />
            </div>
        </div>

        {{-- Country --}}
        <div class="col-sm-4 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.country') }}</label>
                <div class="select">
                    <select class="form-control select1" name="country_id" id="country_id" required>
                        <option selected disabled>اختر الدولة</option>
                        @foreach($countries as $country )
                        <option value="{{ $country->id }}" >
                            {{ $country->getTranslatedAttribute('name', session('lang') ) }} 
                        </option>
                        @endforeach

                    </select>
                    <i class="fa fa-globe"></i>
                </div>
            </div>
        </div>
        {{-- State --}}
        <div class="col-sm-4 col-xs-12 wow fadeInDownBig ">
            <div class="form-group">
                <label class="control-label">{{ trans('front.state') }}</label>
                <div class="select">

                    <select class="form-control select2" name="state_id" id="state_id" required>
                    </select>
                    <i class="fa fa-map-marker"></i>
                </div>
            </div>
        </div>
        {{-- City --}}
        <div class="col-sm-4 col-xs-12 wow fadeInDownBig ">
            <div class="form-group">
                <label class="control-label">{{ trans('front.city') }}</label>
                <div class="select">
                    <select class="form-control selectthree" name="city_id" id="city_id" required>
                    </select>
                    <i class="fa fa-map-marker"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xs-12 wow fadeInDownBig ">
            <div class="form-group">
                <label class="control-label">{{ trans('front.street_name') }} </label>
                <input maxlength="100" type="text" name="street_name" value="{{ orderdata('street_name') }}" class="form-control" placeholder="{{ trans('front.street_name') }}" required />
                <i class="fa fa-map-marker"></i>
            </div>
        </div>

        <div class="col-xs-12 wow fadeInDownBig ">
            <div class="form-group">
                <input type="submit" class="nextPage" value="{{ trans('front.continue') }}" />
            </div>
        </div>

    </form>

</div>
@push('js')

<script>
$(document).ready(function(){

$(document).on('change','#country_id',function () {

        var op = " ";
        var token = '{{ Session::token() }}';

       $.ajax({
        type:'post',
        url:'{!!URL::to('state')!!}',
        data:{'country_id':this.value,_token: token },
        dataType:'json',//return data will be json
        success:function(data){

        for(var i=0;i<data.length;i++){
			op+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
        }
        $('#city_id').html('');
        $('#state_id').prepend('<option disabled="disabled" selected>اختر المنطقة</option>');
        $('#state_id').append(op);

        },
        error:function(){

        }
    });
    });
$(document).on('change','#state_id',function () {
        console.log(this.value);
            var op = " ";
        var token = '{{ Session::token() }}';

       $.ajax({
        type:'post',
        url:'{!!URL::to('city')!!}',
        data:{'state_id':this.value,_token: token },
        dataType:'json',//return data will be json
        success:function(data){
            for(var i=0;i<data.length;i++){
					op+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
                }

        $('#city_id').prepend('<option disabled="disabled" selected>اختر االمدينة</option>');
        $('#city_id').append(op);

        },
        error:function(){

        }
    });
    });
    });
</script>

@endpush

@endsection
