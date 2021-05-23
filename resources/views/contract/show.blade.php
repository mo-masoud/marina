@extends('layouts.app')

@section('content')

<div class="col-xs-12 wow fadeInDownBig" style="visibility: visible;">
    <div class="title title-singer">
        <ul>
          <li><img src="{{ url('images/singer.png') }}" alt=""></li>
            <li><img src="{{ url('images/singer-icon.png') }}" alt=""></li>
        </ul>
        <h1 class="border-grad">{{ trans('front.edit') }}</h1>
    </div>
</div>

<div class="form-style animation-fast">
    <div class="col-md-12 col-xs-12  wow animation-div" style="visibility: visible;">
        <div class="singer-img">
            @if(isset($singer))
             <img src="{{ Voyager::image( $singer->avatar )}}" alt="{{ $singer->name }}">
            @endif
        </div>
    </div>

    
    
        @if($order->final_submit == 0)

     <div class="col-xs-12 wow fadeInDownBig">
       <div class="col-xs-12  wow fadeInDownBig" style="visibility: visible;">
            <button data-toggle="modal" data-target="#t2" class="nextPage" >{{ trans('front.last_save') }}</button>
        </div>
      
    </div>

                <div class="modal fade" id="t2">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                <h1>{{ trans('front.are_you_surefinal_save') }}</h1>
                <p>
                    <i class="fa fa-info-circle"></i>

                    {{ trans('front.message_for_user_before_final_save') }}
                </p>
              </div>
              <div class="modal-footer">
                <form method="GET" action="{{ url('confirm/order/'.$order->id) }}">
                    {{ csrf_field() }}
                    <div class="col-xs-6">
                        <button type="submit" style="width: 100%;" class="nextPage" >{{ trans('front.final_save') }}</button>
                    </div>
                </form>
                <div class="col-xs-6">
                    <button type="button" style="width: 100%;" class="nextPage requ" data-dismiss="modal">
                     {{ trans('front.close') }}
                      </button>
                </div>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


    <div class="col-xs-12  wow fadeInDownBig" style="visibility: visible;">
        <a class="btn-style nextPage animation-div" data-toggle="modal" data-target="#edit_order{{ $order->id }}">تعديل العقد</a>
    </div>
    @endif
    

        @if($order->closed == 0 || $order->canceled == 0)
        
        @if($order->order_type == 'personal')
    <div class="col-xs-12  wow fadeInDownBig" style="visibility: visible;">
        <a href="{{ url('addGroom/'.$order->code_number) }}" class="nextPage">{{ trans('front.addNewGroom') }}</a>
    </div>
    @endif
 
    <div class="col-xs-12  wow fadeInDownBig" style="visibility: visible;">
        <a href="{{ url('delay/'.$order->code_number) }}" class="nextPage">{{ trans('front.delay_joy') }}</a>
    </div>
    <div class="col-xs-12  wow fadeInDownBig" style="visibility: visible;">
        <a href="{{ url('close/'.$order->code_number) }}" class="nextPage">{{ trans('front.close_contract') }}</a>
    </div>
    <div class="col-xs-12  wow fadeInDownBig" style="visibility: visible;">
        <a href="{{ url('cancel/'.$order->code_number) }}" class="nextPage">{{ trans('front.cancel_joy') }}</a>
    </div>
   @else
    @if($order->order_type == 'personal')
    <div class="col-xs-12  wow fadeInDownBig" style="visibility: visible;">
        <a href="javascript:void(0)" class="nextPage disabledPage">{{ trans('front.addNewGroom') }}</a>
    </div>
    @endif
 
    <div class="col-xs-12  wow fadeInDownBig" style="visibility: visible;">
        <a href="javascript:void(0)" class="nextPage disabledPage">{{ trans('front.delay_joy') }}</a>
    </div>
    <div class="col-xs-12  wow fadeInDownBig" style="visibility: visible;">
        <a href="javascript:void(0)" class="nextPage disabledPage">{{ trans('front.close_contract') }}</a>
    </div>
    <div class="col-xs-12  wow fadeInDownBig" style="visibility: visible;">
        <a href="javascript:void(0)" class="nextPage disabledPage">{{ trans('front.cancel_joy') }}</a>
    </div>
    @endif

    <div class="modal fade pad" id="edit_order{{ $order->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body ">
                    <form action="{{ url('orders/update',$order->id) }}" method="post"  id="form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body ">

         @if($order->order_type=='personal')

                            @foreach(\App\Models\Machine::all() as $Machine)

                                <div class="col-md-6 col-xs-12 wow animation-div ">
                                    <div class="form-group otherStyle">
                                        <label class="checkB">
                                            {{ $Machine->name }}

                                            <input
                                                    type="checkbox"
                                                    @if(isset($order->machines))
                                                    {{ in_array( $Machine->name,$order->machines) ? 'checked' : '' }}
                                                            @endif
                                                    name="machine[{{$Machine->id}}]"
                                                    value="{{ $Machine->name }}"
                                            />
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>

                            @endforeach


                            <div class="col-md-12">
                                <label>@lang('front.order_type')</label>
                                <div class="form-group">
                                    <input type="text"   @if($order->order_type =='personal') value="افراد" @else value="شركات"@endif   readonly >
                                </div>
                                {{--<div class="form-group">
                                    <label>@lang('front.order_type')</label>
                                    <select class="form-control" name="order_type">
                                        <option value="personal" @if($order->order_type =='personal') selected @endif>أفراد</option>
                                        <option value="companies" @if($order->order_type =='companies') selected @endif>شركات</option>

                                    </select>
                                </div>--}}
                            </div>



                        {{--@if($order->company_type=='companies')



                         --}}{{--   <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">{{ trans('front.company_type') }}</label>
                                    <div class="select">
                                        <select name="company_type">
                                            <option @if($order->company_name==trans('front.industrial') ) selected  @endif value="{{ trans('front.industrial') }}"  > {{ trans('front.industrial') }} </option>
                                            <option @if($order->company_name==trans('front.commercial') ) selected  @endif  value="{{ trans('front.commercial') }}"  > {{ trans('front.commercial') }} </option>
                                        </select>

                                    </div>
                                </div>
                            </div>--}}{{--

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"> {{ trans('front.company_name') }} </label>
                                    <input maxlength="100" type="text" class="form-control" value="{{ $order->company_name }}" placeholder="{{ trans('front.company_name') }}"  name="company_name" required/>

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">{{ trans('front.commercial_registration_no') }}</label>
                                    <input maxlength="100" type="text" class="form-control" value="{{ $order->commercial_registration_no}}"  placeholder="{{ trans('front.commercial_registration_no') }}"  name="commercial_registration_no" required />

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">{{ trans('front.company_owner_name') }}</label>
                                    <input maxlength="100" type="text" class="form-control" value="{{ $order->company_owner_name }}"  placeholder="{{ trans('front.company_owner_name') }}" name="company_owner_name" required />

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">{{ trans('front.registration_id_number') }}</label>
                                    <input maxlength="100" type="text" class="form-control" value="{{ $order->registration_id_number }}"  placeholder="{{ trans('front.registration_id_number') }}"  name="registration_id_number" required />

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">{{ trans('front.director_name') }}</label>
                                    <input maxlength="100" type="text" class="form-control" value="{{ $order->director_name }}"  placeholder="{{ trans('front.director_name') }}" name="director_name" required />

                                </div>
                            </div>


@endif--}}












                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('front.number_bridal')</label>
                                    <input type="number" class="form-control" name="number_bridal" value="{{ $order->number_bridal }}">
                                </div>
                            </div>

                            {{--<div class="col-md-12">

                                <div class="form-group">
                                    <label>@lang('front.identity_image')</label>
                                    <input class="form-control" type="file" name="identity_image"/>
                                    @if($order->identity_image)
                                        <img src="{{Voyager::image($order->identity_image)}}" class="img-fluid">,
                                    @endif

                                </div>--}}
                            </div>
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label>@lang('front.identity_source')</label>
                                    <input type="text" class="form-control" name="identity_source" value="{{ $order->identity_source }}">

                                </div>
                            </div>
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label>@lang('front.name_bridal')</label>
                                    <input type="text" class="form-control" name="name_bridal" value="{{ $order->name_bridal }}">
                                </div>
                            </div>
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label>@lang('front.birthday')</label>
                                    <input type="date" class="form-control" name="birthday" value="{{ $order->birthday }}">
                                </div>
                            </div>

                            <div class="col-md-12">

                                <div class="form-group">
                                    <label>الدولة</label>
                                    <select name="nationalty">

                                        @foreach(\App\Nationality::get() as $nationality)
                                            <option value="{{$nationality->id}}" {{   $order->nationality == $nationality->id  ? 'selected' :'' }} > {{$nationality->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>




                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label>@lang('front.email_address')</label>
                                        <input type="text" class="form-control" name="email_address" value="{{ $order->email_address }}">
                                    </div>
                                </div>
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label>@lang('front.phone_bridal')</label>
                                        <input type="text" class="form-control" name="phone_bridal" value="{{ $order->phone_bridal }}">
                                    </div>
                                </div>
                            @endif



                             <div class="col-md-12">

                   <div class="form-group">
                     <label>@lang('front.singer_gender')</label>
                     <!--<input type="text" class="form-control" name="singer_gender" value="{{ $order->singer_gender }}">-->

                             <select class="form-control" name="singer_gender">
                       <option {{ $order->singer_gender == 0 ? "selected" : ''}} value="0">مطرب</option>
                       <option {{ $order->singer_gender == 1 ? "selected" : ''}} value="1">مطربة</option>

                     </select>

                   </div>
                   </div>





                            <div class="col-md-12">

                                <div class="form-group">
                                    <label class="control-label">اختيار مطرب</label>
                                    <div class="select">

                                        <select class="form-control " name="singer_id" required>

                                            @foreach($singers as $singer )
                                                <option value="{{ $singer->id }}" {{ ( $order->singer_id == $singer->id  ) ? 'selected' :'' }}>
                                                    {{ $singer->name}}
                                                </option>
                                            @endforeach

                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">

                                <div class="form-group">
                                    <label>رقم الهوية</label>
                                    <input type="text" class="form-control" name="singer_identity" value="{{ $order->identity }}">
                                </div>
                            </div>


                            <div class="col-md-12">

                                <div class="form-group">
                                    @if($order->singer_gender == 0)
                                        <label>إسم الطرب</label>
                                    @else
                                        <label>إسم المطربة</label>

                                    @endif

                                    <input type="text" class="form-control" name="singer_name" value="{{ $order->singer_name  }}">
                                </div>
                            </div>


                            <div class="col-md-12">

                                <div class="form-group">


                                    @if($order->singer_gender == 0)
                                        <label> اسم المطرب الاحتياطي</label>
                                    @else
                                        <label> اسم المطربة الاحتياطي</label>

                                    @endif


                                    <input type="text" class="form-control" name="singer_name_optional" value="{{ $order->singer_name_optional }}">
                                </div>
                            </div>

                            <div class="col-md-12">

                                <div class="form-group">
                                    <label>@lang('front.code_number')</label>
                                    <input type="text" class="form-control" name="code_number" value="{{ $order->code_number }}">
                                </div>
                            </div>


                            <div class="col-md-12">

                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label class="control-label gold">{{ trans('front.carol_type') }}</label>
                                    </div>
                                    <div class="col-md-6 col-xs-6 ">
                                        <div class="form-group">
                                            <label class="checkB">
                                                <input type="radio" class="carol_type" {{ ( $order->carol_type == trans('front.carol_male') ) ? 'checked' : '' }} name="carol_type" value="{{ trans('front.carol_male') }}">
                                                <span><i class=" fa fa-microphone"></i>{{ trans('front.carol_male') }}</span>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-6 ">
                                        <div class="form-group">
                                            <label class="checkB">
                                                <input type="radio" class="carol_type" {{ ( $order->carol_type == trans('front.carol_female')  ) ? 'checked' : '' }} name="carol_type" value="{{ trans('front.carol_female') }}">
                                                <span><i class=" fa fa-microphone"></i>{{ trans('front.carol_female') }}</span>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">

                                <div class="form-group">
                                    <label class="control-label">{{ trans('front.hejry_date') }}</label>

                                    @php
                                        $hegry = new \DateTime($order->hejry_date);
                                        if (session('lang') == 'ar'){
                                            $format = 'ar_SA';
                                        }else{
                                                $format = 'en_US';
                                        }

                                        $formatHejry = new \IntlDateFormatter(
                                            $format.'@calendar=islamic-civil',
                                            \IntlDateFormatter::FULL,
                                            \IntlDateFormatter::FULL,
                                            'Asia/Tehran',
                                            \IntlDateFormatter::TRADITIONAL);

                                        $hejry_date = $formatHejry->format($hegry);

                                    @endphp


                                    <input id="hijrDate" onclick="pickDate(event)"  type="text" name="hejry_date" value="{{$order->hejry_date}}" class="form-control" placeholder="yyy / mm / 01" required />
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </div>

                            <div class="col-md-12">

                                <div class="form-group">
                                    <label class="control-label">{{ trans('front.meladi_date') }}</label>
                                    <input id="gregDate" onclick="pickDate(event)" type="text" name="date" value="{{ $order->date }}" class="form-control" placeholder="yyy / mm / 01" required />
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </div>

                            <div class="col-md-12">

                                <div class="form-group">
                                    <label class="control-label">{{ trans('front.hotel_name') }}</label>
                                    <input type="text" class="form-control" name="hotel_name" value="{{$order->hotel_name}}">

                                </div>
                            </div>

                            <div class="col-md-12">

                                <div class="form-group">
                                    <label class="control-label">{{ trans('front.halls') }}</label>
                                    <input type="text" class="form-control" name="hall_id" value="{{$order->hall_id}}">

                                </div>
                            </div>

                            <div class="col-md-12">

                                <div class="col-md-6 col-xs-6">
                                    <div class="form-group">
                                        <label class="small-label">{{ trans('front.from') }}</label>
                                        <input id="timepicker1" type="text"  value="{{ $order->start_time }}" name="start_time" class="form-control" placeholder="{{ trans('front.from') }}" required />
                                    </div>
                                </div>




                                <div class="col-md-6 col-xs-6">
                                    <div class="form-group to">
                                        <label class="small-label">{{ trans('front.to') }}</label>
                                        <input id="timepicker2" type="text" name="end_time" value="{{ $order->end_time }}"  class="form-control" placeholder="{{ trans('front.to') }}" required />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">

                                <div class="form-group">
                                    <label class="control-label">{{ trans('front.street_name') }} </label>
                                    <input maxlength="100" type="text" name="street_name" value="{{ $order->street_name }}" class="form-control" placeholder="{{ trans('front.street_name') }}" required />
                                    <i class="fa fa-map-marker"></i>
                                </div>
                            </div>
                            @if($order->order_type=='companies')
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label class="control-label">{{ trans('front.company_type') }}</label>
                                        <div class="select">
                                            <select name="company_type">
                                                <option value="{{ trans('front.industrial') }}" {{ ( $order->company_type == trans('front.industrial') ) ? 'selected' :'' }} > {{ trans('front.industrial') }} </option>
                                                <option value="{{ trans('front.commercial') }}" {{ ( $order->company_type == trans('front.commercial')  ) ? 'selected' :'' }} > {{ trans('front.commercial') }} </option>
                                            </select>
                                            <i class="fa fa-building"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12  wow fadeInDownBig">
                                    <div class="form-group">
                                        <label class="control-label"> {{ trans('front.company_name') }} </label>
                                        <input maxlength="100" type="text" class="form-control" value="{{ companystep1('company_name') }}" placeholder="{{ trans('front.company_name') }}"  name="company_name" required/>
                                        <i class="fa fa-building"></i>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12  wow fadeInDownBig">
                                    <div class="form-group">
                                        <label class="control-label">{{ trans('front.commercial_registration_no') }}</label>
                                        <input maxlength="100" type="text" class="form-control" value="{{ companystep1('commercial_registration_no') }}"  placeholder="{{ trans('front.commercial_registration_no') }}"  name="commercial_registration_no" required />
                                        <i class="fa fa-vcard"></i>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12  wow fadeInDownBig">
                                    <div class="form-group">
                                        <label class="control-label">{{ trans('front.company_owner_name') }}</label>
                                        <input maxlength="100" type="text" class="form-control" value="{{ companystep1('company_owner_name') }}"  placeholder="{{ trans('front.company_owner_name') }}" name="company_owner_name" required />
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12  wow fadeInDownBig">
                                    <div class="form-group">
                                        <label class="control-label">{{ trans('front.registration_id_number') }}</label>
                                        <input maxlength="100" type="text" class="form-control" value="{{ companystep1('registration_id_number') }}"  placeholder="{{ trans('front.registration_id_number') }}"  name="registration_id_number" required />
                                        <i class="fa fa-vcard"></i>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12  wow fadeInDownBig">
                                    <div class="form-group">
                                        <label class="control-label">{{ trans('front.director_name') }}</label>
                                        <input maxlength="100" type="text" class="form-control" value="{{ companystep1('director_name') }}"  placeholder="{{ trans('front.director_name') }}" name="director_name" required />
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>

                            @endif
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label>@lang('front.price')</label>
                                    <input type="text" class="form-control" name="price" value="{{ $order->price }}">
                                </div>
                            </div>

                            <div class="col-md-12">

                                <div class="form-group">
                                    <label>@lang('front.price')</label>
                                    <input type="text" class="form-control" name="price" value="{{ $order->price }}">
                                </div>
                            </div>

                            <div class="col-md-12">

                                <div class="form-group">
                                    <label class="control-label">{{ trans('front.country') }}</label>
                                    <div class="select">
                                        <select class="form-control select1" name="country_id" required>

                                            @foreach(countries() as $country )
                                                <option value="{{ $country->id }}" {{ ( $order->country_id == $country->id  ) ? 'selected' :'' }}>
                                                    {{ $country->getTranslatedAttribute('name', session('lang') ) }}
                                                </option>
                                            @endforeach

                                        </select>
                                        <i class="fa fa-globe"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">

                                <div class="form-group">
                                    <label class="control-label">{{ trans('front.state') }}</label>
                                    <div class="select">
                                        <select class="form-control" name="city_id" required>

                                            @foreach(App\Models\City::get() as $city )
                                                <option value="{{ $city->id }}" {{ ( $order->city_id == $city->id  ) ? 'selected' :'' }} >
                                                    {{ $city->getTranslatedAttribute('name', session('lang') ) }}
                                                </option>
                                            @endforeach

                                        </select>
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">

                                <div class="form-group">
                                    <label class="control-label">{{ trans('front.city') }}</label>
                                    <div class="select">

                                        <select class="form-control select2" name="state_id" required>

                                            @foreach(App\Models\State::get() as $state )
                                                <option value="{{ $state->id }}" {{ ( $order->state_id == $state->id  ) ? 'selected' :'' }}>
                                                    {{ $state->getTranslatedAttribute('name', session('lang') ) }}
                                                </option>
                                            @endforeach

                                        </select>
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">

                                <div class="form-group">
                                    <label class="control-label">{{ trans('front.appropriate_type') }}</label>
                                    <div class="select">
                                        <select name="occasion_id">

                                            @foreach(Occasions() as $Occasion )
                                                <option value="{{ $Occasion->id }}"  {{ ( $order->occasion_id == $Occasion->id  ) ? 'selected' :'' }}>
                                                    {{ $Occasion->getTranslatedAttribute('name', session('lang') ) }}
                                                </option>
                                            @endforeach

                                        </select>
                                        <i class="fa fa-viadeo"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">

                               
                            @if($order->reason_of_edit)
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label>@lang('front.reason_of_edit')</label>
                                        <textarea name="reason_of_edit">{{ $order->reason_of_edit}}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label>@lang('front.new_date')</label>
                                        <input type="date" name="new_date" class="form-control" value="{{$order->new_date}}">
                                    </div>
                                </div>

                            @endif


                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <div class="form-group">
                <label class="control-label">{{ trans('front.approved') }}</label>
                <div class="select"  disabled="true">
                    <select name="approved"  disabled="true">
                        <option value="2" @if($order->approved == '0') selected @endif>@lang('front.pending')</option>
                        <option value="1" @if($order->approved == '1') selected @endif>@lang('front.deposited')</option>
                    </select>
                    <i class="fa fa-viadeo"></i>
                </div>
            </div>
            </div>
          @if($order->reason_of_edit)
                    <div class="col-md-12">

            <div class="form-group">
            <label>@lang('front.reason_of_edit')</label>
            <textarea name="reason_of_edit">{{ $order->reason_of_edit}}</textarea>
          </div>
          </div>

                    <div class="col-md-12">

           <div class="form-group">
            <label>@lang('front.new_date')</label>
            <input type="date" name="new_date" class="form-control" value="{{$order->new_date}}">
          </div>
          </div>

          @endif


                    <div class="col-md-12">

           <div class="form-group">
            <label>@lang('front.canceled')</label>
            <select name="canceled"    disabled="true">
            <option value="0" @if($order->canceled == '0') selected @endif>no</option>
              <option value="1" @if($order->canceled == '1') selected @endif>yes</option>
                <option value="2" @if($order->canceled == '2') selected @endif>قيد الانتظار</option>

             </select>
          </div>
          </div>

                    <div class="col-md-12">

           <div class="form-group">
            <label>@lang('front.closed')</label>
            <select name="closed"   disabled="true">
             <option value="0" @if($order->closed == '0' ) selected @endif>no</option>
              <option value="1" @if($order->closed == '1') selected @endif>yes</option>
                <option value="2" @if($order->closed == '2') selected @endif> قيد الانتظار</option>

             </select>
          </div>
          </div>

                   {{-- <div class="col-md-12">

                 <div class="form-group">
                     <label>تم تاجيله</label>
                     <select name="delied"  disabled="true">
                         <option value="0" @if($order->delied == '0' ) selected @endif>غير مؤجل</option>
                         <option value="1" @if($order->delied == '1') selected @endif>مؤجل</option>
                         <option value="2" @if($order->delied == '2') selected @endif>قيد الانتظار</option>

                     </select>
                 </div>

             </div>
--}}


            <div class="col-md-12">

                 <div class="form-group">
                     <label>مؤجل</label>
                     <select name="delied" disabled="true">
                          <option value="0" @if($order->delied == '0' ) selected @endif>غير مؤجل</option>
                         <option value="1" @if($order->delied == '1') selected @endif>مؤجل</option>
                         <option value="2" @if($order->delied == '2') selected @endif>قيد الانتظار</option>

                     </select>
                 </div>

             </div>
                       <div class="modal-footer">
                            <button type="button" class="btn-style " data-dismiss="modal">{{ trans('front.close') }}</button>
                           {{-- @if($order->final_submit==0)
                                <input type="hidden" name="save"  id="save" value="1">

                                <button type="submit"  class="btn-style" >حفظ مبدئى</button>

                                <button  type="button" id="save2" class="btn-style" >حفظ نهائى</button>
                            @endif
--}}

                            <button type="submit"  class="btn-style" >حفظ مبدئى</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>


@endsection
@section('script')
    <script>
        $('#save2').click(function(){

            $('#save').val(2);

            $('#form').submit();
        })
    </script>
    @endsection