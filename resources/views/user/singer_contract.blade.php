@extends('layouts.app')

@section('header')

    <span>فـرقــة مــاريـنـــا الـغــربـيـــة</span>

@endsection

@section('content')

    <div class="col-xs-12 wow fadeInDownBig">
        <!--<div class="title title-singer">-->
        <!--    <ul>-->
        <!--    	<li><img src="images/singer.png" alt="" /></li>-->
        <!--        <li><img src="images/singer-icon.png" alt="" /></li>-->
        <!--    </ul>-->
        <div class="logo singer title title-singer">
            @if(Auth::user()->role_id == 3 || Auth::user()->role_id == 4)
                <div class="singer-img">
                    @if(auth()->check('web'))
                        <img src="{{ url('storage/'.Auth::user()->avatar) }}" alt="" />

                    @else
                        <img src="{{ url('storage/'.App\User::find(Auth::user()->user_id)->avatar) }}" alt="" />
                    @endif
                </div>

            @else
                <img src="images/singer.png" alt="" />
            @endif
           {{-- <img src="images/singer.png" alt="" />--}}
            <h1 class="border-grad">الجداول والعقود</h1>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="contract box two  wow animatio wow animation-div">
                <div class="modal-dialog model pad">
                    <div class="modal-content">
                        <div class="modal-body ">
                            <form action="{{ url('orders/update',$order->id) }}" method="post"  id="form" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body ">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label>@lang('front.order_type')</label>
                                            <select class="form-control" name="order_type">
                                                <option value="personal" @if($order->order_type =='personal') selected @endif>أفراد</option>
                                                <option value="companies" @if($order->order_type =='companies') selected @endif>شركات</option>

                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>@lang('front.number_bridal')</label>
                                            <input type="number" class="form-control" name="number_bridal" value="{{ $order->number_bridal }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label>@lang('front.identity_image')</label>
                                            <input class="form-control" type="file" name="identity_image"/>
                                            @if($order->identity_image)
                                                <img src="{{Voyager::image($order->identity_image)}}" class="img-fluid">,
                                            @endif

                                        </div>
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

                                    {{-- <div class="col-md-12">

                          --}}{{-- <div class="form-group">
                             <label>@lang('front.singer_gender')</label>
                             <!--<input type="text" class="form-control" name="singer_gender" value="{{ $order->singer_gender }}">-->

                                     <select class="form-control" name="singer_gender">
                               <option {{ $order->singer_gender == 0 ? "selected" : ''}} value="0">مطرب</option>
                               <option {{ $order->singer_gender == 1 ? "selected" : ''}} value="1">مطربة</option>

                             </select>

                           </div>--}}{{--
                           </div>--}}

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

                                            <input type="text" class="form-control" name="singer_name" value="{{ (\App\User::find($order->singer_id)->name)  }}">
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
                                    @if($order->company_type && $order->company_name)
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

                                        <div class="form-group">
                                            <label class="control-label">{{ trans('front.approved') }}</label>
                                            <div class="select">
                                                <select name="approved">
                                                    <option value="0" @if($order->approved == '0') selected @endif>@lang('front.pending')</option>
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
                                            <select name="canceled">
                                                <option value="1" @if($order->canceled == '1') selected @endif>yes</option>
                                                <option value="0" @if($order->canceled == '0') selected @endif>no</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label>@lang('front.closed')</label>
                                            <select name="closed">
                                                <option value="1" @if($order->closed == '1') selected @endif>yes</option>
                                                <option value="0" @if($order->closed == '0') selected @endif>no</option>
                                            </select>
                                        </div>
                                    </div>



                                </div>
                                <div class="modal-footer">
                                  {{--  <button type="button" class="btn-style " data-dismiss="modal">{{ trans('front.close') }}</button>
                                    @if($order->approved==2)
                                        <input type="hidden" name="save"  id="save" value="1">

                                        <button type="submit"  class="btn-style" >حفظ مبدئى</button>

                                        <button  type="button" id="save2" class="btn-style" >حفظ نهائى</button>
                                    @endif


--}}
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

        </div>


@endsection

@push('js')


@endpush