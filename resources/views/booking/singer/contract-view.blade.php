@extends('layouts.app')

@section('content')

    <div class="col-xs-12 wow fadeInDownBig">
        <div class="title title-singer">
            <ul>
                <!--<li><img src="{{ url('images/singer.png') }}" alt="" /></li>-->
                <!--<li><img src="{{ url('images/singer-icon.png') }}" alt="" /></li>-->
            </ul>
            <h1 class="border-grad">{{ trans('front.contract_preview') }}</h1>
        </div>
    </div>

    <div class="col-xs-12">
        <h1 class="title-table wow animation-div">{{ trans('front.the_first_side') }}</h1>
        <div class="contract box wow animatio wow animation-div">
            <table>
                <tbody>
                    <tr>
                        <td>م</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>{{ trans('front.order_id') }}</td>
                        <td>{{ getLastOrder() }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('front.hejry_date_contract') }}</td>
                        @php
$current_date_time = new DateTime("now");
$user_current_date = $current_date_time->format("Y-m-d");

                        @endphp
                        <td>{{ $user_current_date }}</td>

                    </tr>
                    <tr>
                        <td>{{ trans('front.name_bridal') }}</td>
                        <td>{{ orderdata('name_bridal') }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('front.nationality') }}</td>
                        <td>{{ nationalityName(orderdata('nationality')) }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('front.identity_source') }}</td>
                        <td>{{ orderdata('identity_source') }}</td>
                    </tr>
                    <tr>
                        <td>رقم الهوية</td>
                        <td>{{ orderdata('identity') }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('front.birthday') }}</td>
                        <td>{{ orderdata('birthday') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!--<div class="col-xs-12">-->
    <!--    <h1 class="title-table wow fadeInDownBig"> {{ trans('front.second_party') }} </h1>-->
    <!--    <div class="contract box wow fadeInDownBig">-->

    <!--        <table>-->
    <!--            <tbody>-->
    <!--                <tr>-->
    <!--                    <td>م</td>-->
    <!--                    <td>1</td>-->
    <!--                </tr>-->
    <!--                <tr>-->
    <!--                    <td>{{ trans('front.hejry_date_contract') }}</td>-->
    <!--                    <td>{{ orderdata('hejry_date') }}</td>-->
    <!--                </tr>-->
    <!--                <tr>-->
    <!--                    <td> {{ trans('front.second_party') }}</td>-->
    <!--                    <td>فرقة مارينا الغربية</td>-->
    <!--                </tr>-->
    <!--                <tr>-->
    <!--                    <td>{{ trans('front.job') }}</td>-->
    <!--                    <td>{{setting('site.Coordinator')}}</td>-->
    <!--                </tr>-->
    <!--                <tr>-->
    <!--                    <td>{{--{{ trans('front.identity_source') }}--}}رقم العضوية بجمعية الثقافة والفنون</td>-->
    <!--                    <td>{{--{{setting('site.id_number')}}--}}1-1295963</td>-->
    <!--                </tr>-->
    <!--                <tr>-->
    <!--                    <td>{{--{{ trans('front.birthday') }}--}}رقم هوية المنسق</td>-->
    <!--                    <td>2061895963</td>-->
    <!--                </tr>-->
    <!--                <tr>-->
    <!--                    <td>مصدر الهوية</td>-->
    <!--                    <td>جدة</td>-->
    <!--                </tr>-->
    <!--            </tbody>-->
    <!--        </table>-->
    <!--    </div>-->
    <!--</div>-->

    <div class="col-xs-12">
        <!--<h1 class="title-table wow fadeInDownBig">{{ trans('front.terms_contract') }} </h1>-->
        <h1 class="title-table wow fadeInDownBig">الطرف الثانى </h1>
        <div class="contract box wow fadeInDownBig">

            <table>
                <tbody>
                    <tr>
                        <td>م</td>
                        <td>1</td>
                    </tr>
                     @if(orderdata('singer_gender') ==  1)
                    <tr>
                        <td>{{ trans('front.singer_name_female') }}</td>
                        <td> {{ orderdata('singer_name_female') }}</td>
                    </tr>
                    @else
                    <tr>
                        <td>{{ trans('front.singer_name_male') }}</td>
                        <td> {{ orderdata('singer_name_male') }}</td>
                    </tr>
                    @endif

                    @if(orderdata('singer_gender') ==  'female')
                         <tr>
                            <td>{{ trans('front.singer_name_optional_female') }}</td>
                            <td>{{ orderdata('singer_name_optional_female') }}</td>
                        </tr>
                    @else
                    <tr>
                        <td>{{ trans('front.singer_name_optional_male') }}</td>
                        <td> {{ orderdata('singer_name_optional_male') }}</td>
                    </tr>
                    @endif

                    <tr>
                        <td>{{ trans('front.carol_type') }}</td>
                        <td>{{ orderdata('carol_type') }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('front.hejry_date') }}</td>
                        <td>{{ orderdata('hejry_date') }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('front.meladi_date') }}</td>
                        <td>{{ orderdata('date') }}</td>
                    </tr>
                    <tr>
                        <td>المواصلات والاجهزة الصوتية</td>
                        <td>مؤمنة</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-xs-12">
        <h1 class="title-table wow fadeInDownBig">{{ trans('front.location_occasion') }} </h1>
        <div class="contract box wow fadeInDownBig">

            <table>
                <tbody>
                               <tr>
                        <td>{{ trans('front.country') }}</td>
                        <td>{{ GetModelbyName('App\Models\Country', orderdata('country_id') ) }}</td>
                    </tr>
      
                    <tr>

                        <td>{{ trans('front.state') }}</td>
                                                <!--<td>{{ GetModelbyName('App\Models\State', orderdata('state_id') ) }}</td>-->
                                                                        <td>{{ App\Models\State::find(orderdata('state_id'))->name  }}</td>

                    </tr>
                                  <tr>
                        <td>{{ trans('front.city') }}</td>
                                                <!--<td>{{ GetModelbyName('App\Models\City', orderdata('city_id') ) }}</td>-->
                                                                        <td>{{ App\Models\City::find(orderdata('city_id'))->name  }}</td>--}}


                    </tr>
                    <tr>
                        <td>{{ trans('front.street_name') }}</td>
                        <td>{{ orderdata('street_name') }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('front.hotel_name') }}</td>
                        <td>{{ orderdata('hotel_name') }}</td>
                    </tr>
                    <tr>
                        <td>م</td>
                        <td>1</td>
                    </tr>
                  
                  
                  
                        
                                         @if(orderdata('singer_gender') ==  1)

                    <tr>
                        <td>وقت حضور المطربة</td>
                        <td>{{ orderdata('start_time') }}</td>
                    </tr>
                    <tr>
                        <td>وقت مغادرة المطربة</td>
                        <td>{{ orderdata('end_time') }}</td>
                    </tr>
                    @else
                    
               <tr>
                        <td>وقت حضور المطرب</td>
                        <td>{{ orderdata('start_time') }}</td>
                    </tr>
                    <tr>
                        <td>وقت مغادرة المطرب</td>
                        <td>{{ orderdata('end_time') }}</td>
                    </tr>> 
                    
                    @endif
                    
                    
                    
                    <tr>
                        <td>{{ trans('front.zipper_bar_price') }}</td>
                        <td>500 {{ trans('front.ryal') }}</td>
                    </tr>
                    <tr>
                        <td> {{ trans('front.free_zaaf') }} </td>
                        <td>{{ trans('front.one') }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('front.the_amount') }} </td>
                        <td>{{ agreements('price') }} <br /> </td>
                    </tr>
                    <tr>
                        <td>{{ trans('front.deposit') }}</td>
                        <td>{{ agreements('deposit') }} <br /></td>
                    </tr>
                    <tr>
                        <td>{{ trans('front.remaining_amount') }}</td>
                        <td>{{ agreements('remaining_amount') }} </td>
                    </tr>
                    <tr>
                        <td>{{ trans('front.time_of_working') }}</td>
                        {{--@php

                            $start = strtotime( orderdata('start_time') );
                            $end=  strtotime(orderdata('end_time'));
                            $diff= $start-$end;
                            $timeElapsed= gmdate("h:i",$diff);
                        @endphp--}}
                        <td> {{--{{ $timeElapsed }}--}}5 {{ trans('front.hours') }} </td>
                    </tr>
                    <tr>
                        <td>{{ trans('front.price_of_hour_plus') }}</td>
                        
                                                @php
                        $extra_hours=DB::table('Extra_Hours')->first();
                        @endphp
                        <td>{{$extra_hours->extra_hours}} {{ trans('front.ryal') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-xs-12 wow fadeInDownBig">
        <div class="col-xs-6 padding-right">
            <button data-toggle="modal" data-target="#t2" class="nextPage" >{{ trans('front.final_save') }}</button>
        </div>
        <div class="col-xs-6 padding-left">
            <button data-toggle="modal" data-target="#t1" class="nextPage requ" >
              {{ trans('front.preservative_save') }}
              </button>
        </div>
    </div>

        <div class="modal fade" id="t1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h1>{{ trans('front.dear_user') }}</h1>
                <table class="client">
                    <tr>
                        <td colspan="2"><span>
                          {{ trans('front.your_request_number_is') }}
                        </span></td>
                        <td><input type="text" value="{{ getLastOrder() }}" readonly /></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <span>عزيزي العميل شكرا لاختياركم موقع مارينا الغربية نامل اكمال حجزكم خلال 24 ساعه من الدخول مره اخرة وعمل حفظ نهائي</span>
                        </td>
                    </tr>

                </table>
              </div>
              
              
       <div class="modal-footer">
                <span>{{ trans('front.please_press_in_final_saveToSave') }}</span>
                <form method="POST" action="{{ url('singer/finalStep/0') }}">
                     <input name="status" type="hidden" value="2">
                      {{ csrf_field() }}
                      <div class="col-xs-6">
                          <button type="submit" class="nextPage" >{{ trans('front.preservative_save') }}</button>
                      </div>
                  </form>
              </div>
              
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

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
                <form method="POST" action="{{ url('singer/finalStep/1') }}">
                    {{ csrf_field() }}
                    <div class="col-xs-6">
                        <button type="submit" class="nextPage" >{{ trans('front.final_save') }}</button>
                    </div>
                </form>
                <div class="col-xs-6">
                    <button type="button" class="nextPage requ" data-dismiss="modal">
                     {{ trans('front.close') }}
                      </button>
                </div>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade" id="t3">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <div class="icon">
                    <i class="fa fa-check"></i>
                </div>
                <h1>تم حفظ بياناتكم بنجاح !</h1>
                <h1>شكرا لاختياركم مارينا الغربية</h1>
                <div class="progress-container">
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-success" style="width:0%"></div>
                    </div>
                </div>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
@endsection
