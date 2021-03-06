@extends('layouts.app')

@section('content')



<div class="col-xs-12 wow fadeInDownBig">
    <div class="title title-singer">
        <ul>
        
                                    @if(Request()->session()->has('company_r_type') && session()->get('company_r_type') == "singer" && !empty(session('singer')) )
            <div class="singer-img">

                	<img src="{{ Voyager::image( session('singer')->avatar )}}" alt="{{ session('singer')->name }}">
            </div>
@else
     	<li><img src="{{ url('images/singer.png') }}" alt="" /></li>
            <!--<li><img src="{{ url('images/singer-icon.png') }}" alt="" /></li>-->
@endif
            
        </ul>
        <h1 class="border-grad">{{ trans('front.companies_title') }}</h1>
    </div>
</div>
<div class="form-style">
    <form action="{{ url('/booking/marina/companies/step2') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-6 col-xs-12 wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.party_place') }}</label>
                <div class="select">
                    <select name="party_place">
                        <option value="{{ trans('front.hall') }}">{{ trans('front.hall') }}</option>
                        <option value="{{ trans('front.caffe') }}">{{ trans('front.caffe') }}</option>
                    </select>
                    <i class="fa fa-building"></i>
                </div>
            </div>
        </div>
        
        {{-- Country --}}
        <div class="col-sm-6 col-xs-12  wow fadeInDownBig">
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
        <div class="col-sm-6 col-xs-12 wow fadeInDownBig ">
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
        <div class="col-sm-6 col-xs-12 wow fadeInDownBig ">
            <div class="form-group">
                <label class="control-label">{{ trans('front.city') }}</label>
                <div class="select">
                    <select class="form-control selectthree" name="city_id" id="city_id" required>
                    </select>
                    <i class="fa fa-map-marker"></i>
                </div>
            </div>
        </div>        


        
        <div class="col-md-6 col-xs-12 wow fadeInDownBig ">
            <div class="form-group">
                <label class="control-label">{{ trans('front.street_name') }} </label>
                <input maxlength="100" type="text" name="street_name" value="{{ companystep2('street_name') }}" class="form-control" placeholder="{{ trans('front.street_name') }}" required />
                <i class="fa fa-map-marker"></i>
            </div>
        </div>


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
        
        
        <!--<div class="col-md-6 col-xs-12  wow fadeInDownBig">-->
        <!--    <div class="form-group">-->
        <!--        <label class="control-label">{{ trans('front.hejry_date') }}</label>-->
        <!--        <input maxlength="100" type=" date"value="1414-01-01" name="hejry_date"  value="{{ companystep2('hejry_date') }}" class="form-control" placeholder="yyy / mm / 01" required />-->
        <!--        <i class="fa fa-calendar"></i>-->
        <!--    </div>-->
        <!--</div>-->


        <!--<div class="col-md-6 col-xs-12  wow fadeInDownBig">-->
        <!--    <div class="form-group">-->
        <!--        <label class="control-label">{{ trans('front.meladi_date') }}</label>-->
        <!--        <input type="date" name="date"   value="{{ companystep2('date') }}" class="form-control " placeholder="" required />-->
                <!--<i class="fa fa-calendar"></i>-->
        <!--    </div>-->
        <!--</div>-->

        <div class="col-md-6 col-xs-12  wow fadeInDownBig" @unless($singer == null) style="display:none"  @endunless>
            <div class="form-group">
                <label class="control-label">{{ trans('front.singer_gender') }}</label>
                <div class="select">
                     <select id="type" name="singer_gender">
                        @if($singer == null)
                            <option value="female" {{ ( companystep2('singer_gender') == 'female'  ) ? 'selected' :'' }}>مطربة</option>
                            <option value="male" {{ ( companystep2('singer_gender') == 'male'  ) ? 'selected' :'' }}>مطرب</option>
                        @else
                            <option value="female" {{ $singer->gender == 1   ? 'selected' :'' }}>مطربة</option>
                            <option value="male"   {{ $singer->gender == 0   ? 'selected' :'' }}>مطرب</option>
                        @endif
                    </select>
                    <i class="fa fa-microphone"></i>
                </div>
            </div>
        </div>
        @if($singer == null)
            <div class="col-xs-12 padding types wow fadeInDownBig" id="female">
                <div class="col-md-6 col-xs-12 ">
                    <div class="form-group">
                        <label class="control-label">{{ trans('front.singer_name_female') }}</label>
                        <select name="singer_female_id" required @unless($singer == null) disabled = "disabled"  @endunless>
                            <!--<option selected>الإسم</option>-->
                            @foreach($females as $female)
                                <option value="{{ $female->id }}" {{ ( companystep2('singer_female_id') ==  $female->id  ) ? 'selected' :'' }}>{{ $female->name }}</option>
                            @endforeach
                        </select>       
                        <i class="fa fa-microphone"></i>
                    </div>
                </div>

                <div class="col-md-6 col-xs-12  wow fadeInDownBig">
                    <div class="form-group">
                        <label class="control-label">{{ trans('front.singer_name_optional_female') }} </label>
                        <input maxlength="100" type="text" name="singer_name_optional_female" value="{{ companystep2('singer_name_optional_female') }}" class="form-control" placeholder="{{ trans('front.singer_name_optional_female') }}" />
                        <i class="fa fa-microphone"></i>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 padding types hideT wow fadeInDownBig" id="male">
                <div class="col-md-6 col-xs-12 ">
                    <div class="form-group">
                        <label class="control-label">{{ trans('front.singer_name_male') }}</label>
                        <select name="singer_male_id" @unless($singer == null) disabled = "disabled"  @endunless>
                            <option selected>الإسم</option>
                            @foreach($males as $male)
                                <option value="{{ $male->id }}" {{ ( companystep2('singer_male_id') ==  $male->id  ) ? 'selected' :'' }}>{{ $male->name }}</option>
                            @endforeach
                        </select>
                        <i class="fa fa-microphone"></i>
                    </div>
                </div>

                <div class="col-md-6 col-xs-12  wow fadeInDownBig">
                    <div class="form-group">
                        <label class="control-label">{{ trans('front.singer_name_optional_male') }} </label>
                        <input maxlength="100" type="text" name="singer_name_optional_male" value="{{ companystep2('singer_name_optional_male') }}" class="form-control" placeholder="{{ trans('front.singer_name_optional_male') }}" />
                        <i class="fa fa-microphone"></i>
                    </div>
                </div>
            </div>
        @else
            @if($singer->gender == 1)
                <div class="col-xs-12 padding types wow fadeInDownBig" id="female">
                    <div class="col-md-6 col-xs-12 ">
                        <div class="form-group">
                            <label class="control-label">{{ trans('front.singer_name_female') }}</label>
                            <select name="singer_female_id" @unless($singer == null) disabled = "disabled"  @endunless>
                                <option selected>الإسم</option>
                                @foreach($females as $female)
                                    <option value="{{ $female->id }}" {{ $singer->id ==  $female->id   ? 'selected' :'' }}>{{ $female->name }}</option>
                                @endforeach
                            </select>       
                            <i class="fa fa-microphone"></i>
                        </div>
                    </div>

                    <div class="col-md-6 col-xs-12  wow fadeInDownBig">
                        <div class="form-group">
                            <label class="control-label">{{ trans('front.singer_name_optional_female') }} </label>
                            <input maxlength="100" type="text" name="singer_name_optional_female" value="{{ companystep2('singer_name_optional_female') }}" class="form-control" placeholder="{{ trans('front.singer_name_optional_female') }}" />
                            <i class="fa fa-microphone"></i>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-xs-12 padding types wow fadeInDownBig" id="male">
                    <div class="col-md-6 col-xs-12 ">
                        <div class="form-group">
                            <label class="control-label">{{ trans('front.singer_name_male') }}</label>
                            <select name="singer_male_id" @unless($singer == null) disabled = "disabled"  @endunless>
                                <option selected>الإسم</option>
                                @foreach($males as $male)
                                    <option value="{{ $male->id }}" {{ $singer->id ==  $male->id   ? 'selected' :'' }}>{{ $male->name }}</option>
                                @endforeach
                            </select>
                            <i class="fa fa-microphone"></i>
                        </div>
                    </div>

                    <div class="col-md-6 col-xs-12  wow fadeInDownBig">
                        <div class="form-group">
                            <label class="control-label">{{ trans('front.singer_name_optional_male') }} </label>
                            <input maxlength="100" type="text" name="singer_name_optional_male" value="{{ companystep2('singer_name_optional_male') }}" class="form-control" placeholder="{{ trans('front.singer_name_optional_male') }}" />
                            <i class="fa fa-microphone"></i>
                        </div>
                    </div>
                </div>
            @endif
        @endif
        <div class="col-md-12 col-xs-12  wow fadeInDownBig">
            <span class="small-text margin"><i class="fa fa-clock-o"></i> {{ trans('front.time_of_start') }}</span>
        </div>

        <div class="col-md-6 col-xs-6  wow fadeInDownBig">
            <div class="form-group">
                <label class="small-label">{{ trans('front.from') }}</label>
                <input id="timepicker1" type="text"  value="{{ companystep2('start_time') }}" name="start_time" class="form-control" placeholder="{{ trans('front.from') }}" required />
            </div>
        </div>

        <div class="col-md-6 col-xs-6  wow fadeInDownBig">
            <div class="form-group to">
                <label class="small-label">{{ trans('front.to') }}</label>
                <input id="timepicker2" type="text" name="end_time" value="{{ companystep2('end_time') }}"  class="form-control" placeholder="{{ trans('front.to') }}" required />
            </div>
        </div>


   {{-- esraa  --}}  <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">اليوم</label>
                <div class="select">
                    <select name="day">
                        <option value="السبت">السبت</option>
                        <option value ="الاحد">الاحد</option>
                        <option value="الاثنين">الاثنين</option>
                        <option value="الثلاثاء">الثلاثاء</option>
                        <option value="الاربعاء">الاربعاء</option>
                        <option value="الخميس">الخميس</option>
                        <option value="الجمعه">الجمعه</option>
                    </select>
                    <i class="fa fa-calendar"></i>
                </div>
            </div>
        </div>
{{-- mohamed --}}
        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.price') }}</label>

                <select name="price" class="price">

                    @foreach(prices() as $price)
                        <option value="{{ $price->price }}" {{ ( companystep2('price') == $price->price  ) ? 'selected' :'' }} >
                            {{ $price->price }}
                        </option>
                    @endforeach

                </select>

                <i class="fa fa-dollar"></i>
            </div>
        </div>

        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.time_of_working') }}</label>
                <input maxlength="100" type="number" class="form-control" name="time_of_working" value="{{ companystep2('time_of_working') }}" placeholder="{{ trans('front.time_of_working') }}" required />
                <i class="fa fa-clock-o"></i>
            </div>
        </div>

        <div class="col-md-6 col-xs-12 wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.concert') }} </label>
                <div class="select">
                    <select name="concert">

                        <option value="{{ trans('front.romantic_evening') }}" {{ ( companystep2('romantic_evening') == 'romantic_evening'  ) ? 'selected' :'' }} >
                             {{ trans('front.romantic_evening') }}
                         </option>

                        <option value="{{ trans('front.birthday_concret') }}" {{ ( companystep2('birthday_concret') == 'birthday_concret'  ) ? 'selected' :'' }} >
                            {{ trans('front.birthday_concret') }}
                        </option>

                        <option value="{{ trans('front.national_day') }}" {{ ( companystep2('national_day') == 'national_day'  ) ? 'selected' :'' }} >
                            {{ trans('front.national_day') }}
                        </option>

                    </select>
                    <i class="fa fa-viadeo"></i>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xs-12 wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.permits') }}</label>
                <div class="select">
                    <select name="permits">
                        <option value="{{ trans('front.permits_emirate') }}" {{ ( companystep2('permits_emirate') == trans('front.permits_emirate') ) ? 'selected' :'' }} >
                                {{ trans('front.permits_emirate') }}
                        </option>

                        <option value="{{ trans('front.permits_governorate') }}" {{ ( companystep2('permits_governorate') == trans('front.permits_governorate')  ) ? 'selected' :'' }}>
                            {{ trans('front.permits_governorate') }}
                        </option>

                        <option value="{{ trans('front.permits_police') }}" {{ ( companystep2('permits_police') == trans('front.permits_police')  ) ? 'selected' :'' }}>
                            {{ trans('front.permits_police') }}
                        </option>
                        <option value="{{ trans('front.permits_authority') }}" {{ ( companystep2('permits_authority') == trans('front.permits_authority')  ) ? 'selected' :'' }}>
                            {{ trans('front.permits_authority') }}
                        </option>
                        <option value="{{ trans('front.permits_other') }}" {{ ( companystep2('permits_other') == trans('front.permits_other')  ) ? 'selected' :'' }}>
                            {{ trans('front.permits_other') }}
                        </option>

                    </select>
                    <i class="fa fa-file-text"></i>
                </div>
            </div>
        </div>

        <div class="col-xs-12 wow fadeInDownBig ">
            <div class="form-group">
                <input type="submit" class="nextPage" value="{{ trans('front.continue') }}" />
            </div>
        </div>
    </form>

</div>

@endsection
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

<script type="text/javascript">

    'use strict';
    let picker = new Datepicker();
    let pickElm = picker.getElement();
    let pLeft = 200;
    let pWidth = 300;
    pickElm.style.position = 'absolute';
    pickElm.style.left = pLeft + 'px';
    pickElm.style.top = '172px';
    picker.attachTo(document.body);
    picker.setLanguage('ar');


    picker.onPicked = function() {
        let elgd = document.getElementById('gregDate');
        let elhd = document.getElementById('hijrDate');
        if(picker.getPickedDate() instanceof Date){
            elgd.value=picker.getPickedDate().getDateString();
            elhd.value=picker.getOppositePickedDate().getDateString()
        }else{
            elhd.value=picker.getPickedDate().getDateString();
            elgd.value=picker.getOppositePickedDate().getDateString()
        }
    };

    function pickDate(ev) {
        ev = ev || window.event;
        let el = ev.target || ev.srcElement;
        pLeft = ev.pageX;
        fixWidth();
        pickElm.style.top = ev.pageY + 'px';
        picker.setHijriMode(el.id == 'hijrDate');
        picker.show();
        el.blur()
    }

    function fixWidth(){
        let docWidth=document.body.offsetWidth;
        let isFixed=false;
        if(pLeft+pWidth>docWidth)pLeft=docWidth-pWidth;
        if(docWidth>=992&&pLeft<200)pLeft=200;
        else if(docWidth<992&&pLeft<0)pLeft=0;
        if(pLeft+pWidth>docWidth){
            pWidth=docWidth-pLeft;
            picker.setWidth(pWidth);
            document.getElementById('valWidth').value=pWidth;
            document.getElementById('sliderWidth').value=pWidth;
            isFixed=true
        }
        pickElm.style.left=pLeft+'px';
        return isFixed
    }

     $('.carol_type').on('change', function() {
        $('.carol_type').not(this).prop('checked', false);
    });


</script>

@endpush