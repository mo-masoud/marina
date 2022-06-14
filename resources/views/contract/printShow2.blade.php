@extends('layouts.app')

@section('content')


<div class="col-xs-12">
    <div class="contract-view print-n " id="printDiv">
        <div class="logo-print">
            {{--@if($order->singer_gender == '1' || $order->singer_gender == '0')
          </p> <img src="{{ asset('storage/'.$singer->logo) }}" />
            @else
        	          </p> <img src="{{  asset('storage/'.setting('site.marina_contract_image')) }}" />
          <!--</p> <img src="{{ url('images/logo-p.png') }}" />-->
            @endif


            </p> <img src="{{ asset('storage/'.$singer->logo) }}" />--}}

            @if($order->provided_by_marina==0)
                @if($order->singer_gender == '1' || $order->singer_gender == '0' )
                    
                    <!--<img src="{{ asset('storage/'.App\User::find($order->user_id)->first()->logo) }}" />-->

                @endif

            @else
                {{--<img src="{{ asset('storage/'.setting('site.marina_contract_image'))}}" /> --}}

            @endif



        </div>
        <table>
            <tr class="head-top">
                <td>
                    <table class=" top-head">
                        <tr>
                            <td><span class="span-t">
                                    <div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                    <i>
                                        تاريخ تحرير العقد
                                    </i>
                                </span></td>
                            <td><span class="date-con">{{  $order->created_at->format('Y/m/d') }}</span></td>
                           {{-- <td><span class="date-con">{{ $order->created_at->format('F jS, Y') }}</span></td>--}}
                            <td><span class="span-t">



                                    <div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                    <i>
                                        رقم العقد
                                    </i>
                                </span></td>
                            <td><span class="date-con">{{ $order->code_number }}</span></td>
                            <td colspan="5">
                                <div class="title title-singer">
                                    <ul>
                                        @if($order->provided_by_marina==0 &&isset($singer->logo))
                                        
                                          @if($order->singer_gender == 0 || $order->singer_gender == 1)
                                               <li><img src="{{ url('images/singer.png') }}" alt=""></li>
                                                 @endif
                                        @if($order->singer_gender == '1' || $order->singer_gender == '0')

                                            <li><img src="{{ asset('storage/'.$singer->logo) }}" alt=""></li>
                                          
                                        @else
                                            <li> <img src="{{url('images/singer.png') }}" /></li>

                                        @endif
                                        @endif
                                        
                                        @if($order->provided_by_marina==1)
                                        <li> <img src="{{url('images/singer.png') }}" /></li>
                                        @endif
                                        
                                        
                        
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="type-title">
                                    <div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                    <i>
                                        نوع المناسبة
                                        </i>
                                </span></td>
                            <td><span class="content-type">{{ $order->concert}}</span></td>
                        </tr>

                        <tr class="title-h">
                            <td>الطرف الأول :</td>
                        </tr>


                    </table>
                </td>
            </tr>

            <tr class="head-center">
                <td>
                    <table class="table-center">
                        <tr>
                            <th>
                                <div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                <i>البند</i>
                            </th>
                            <th>
                                <div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                <i>نوع المنشأة</i>
                            </th>
                            <th>
                                <div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                <i>اسم المنشأة</i>
                            </th>
                            <th>
                                <div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                <i>رقم السجل التجاري</i>
                            </th>
                            <th>
                                <div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                <i>مالك المنشأة</i>
                            </th>
                            <th>
                                <div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                <i>رقم هوية مالك المنشأة </i>
                            </th>
                            <th>
                                <div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                <i> اسم المدير بالمنشاة</i>
                            </th>
                            <!--<th><div class="img"><img src="{{ url('images/gray.png') }}" /></div>-->
                            <!--  <i>نوع التصريح</i></th>-->
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>{{ $order->company_type }}</td>
                            <td>{{ $order->company_name }}</td>
                            <td>{{ $order->commercial_registration_no }}</td>
                            <td>{{ $order->company_owner_name }}</td>
                            <td>{{ $order->registration_id_number }}</td>
                            <td>{{ $order->director_name }}</td>
                            <!--<td>{{ $order->permits}}</td>-->
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="title-h">
                @if($order->singer_gender == 1)
                <td>بيانات المطربة :</td>
                @elseif($order->singer_gender == 0)
                <td>بيانات المطرب :</td>
                @else
                <td>الطرف الثاني :</td>
                
                @endif
            </tr>



            @if($order->singer_gender == 0 || $order->singer_gender == 1)
            <tr class="head-center">
                <td>
                    <table class="table-center">
                        <tr>
                            <th>
                                <div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                <i>البند</i>
                            </th>
                            <th>
                                <div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                <i>الاسم الرباعي</i>
                            </th>
                            <th>
                                <div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                <i>رقم الهوية</i>
                            </th>
                            <th>
                                <div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                <i>الوظيفة</i>
                            </th>
                            <th>
                                <div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                <i>رقم العضوية</i>
                            </th>
                            <th>
                                <div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                <i>إنتماء العضو أو الفرقة</i>
                            </th>
                            <th>
                                <div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                <i>مصدرها</i>
                            </th>
                        </tr>
                        <tr>
                            <td style="color:#22b14c;">الطرف الثاني</td>
                            <td style="color:#22b14c;">حسين محمد العولقي</td>
                            <td style="color:#22b14c;">2061895963</td>
                            <td style="color:#22b14c;">منسق الفرقة</td>
                            <td style="color:#22b14c;">1-1295963</td>
                            <td style="color:#22b14c;">الجمعية العربية السعودية للثقافة والفنون</td>
                            <td style="color:#22b14c;">جدة</td>
                        </tr>
                    </table>
                    @if($order->singer_gender == 0)

            <tr class="title-h">
                <td> بيانات المطرب :</td>
            </tr>
            @else
            <tr class="title-h">
                <td> بيانات المطربة :</td>
            </tr>
            @endif
            @endif

            <tr class="head-center">
                <td>
                    <table class="table-center">
                        <tr>
                            <th>
                                <div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                <i>البند</i>
                            </th>
                            <th>
                                <div class="img"><img src="{{ url('images/gray.png') }}" /></div>

                        @if($order->singer_gender == 1)
                                <i>اسم المطربة :</i>

                                @elseif($order->singer_gender == 0)
                                <i>اسم المطرب :</i>

                                @else
                                <i>الطرف الثاني :</i>
                                
                                @endif
                            </th>
                            <th>
                                <div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                <i>اسم المطرب الاختياطي</i>
                            </th>
                            <th>
                                <div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                <i>رقم الهوية</i>
                            </th>
                            <th>
                                <div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                <i>الوظيفة</i>
                            </th>

                            <th>
                                <div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                <i> رقم الجوال </i>
                            </th>

                        </tr>
                        @php
                        $singer = \App\User::find($order->singer_id);
                        
                        @endphp
                        
                        @if($singer != null)
                        <tr>
                            <td style="color:#22b14c;">1</td>
                            <td style="color:#22b14c;">{{$singer->name}} </td>
                            <td style="color:#22b14c;">{{$order->singer_name_optional}} </td>
                            <td style="color:#22b14c;">{{$singer->national_id ? $singer->national_id : 'لم يتم تسجيل رقم هوية لهذا المطرب'}} </td>
                            <td style="color:#22b14c;">{{$singer->gender == 1 ? "مطربة" : "مطرب"}} </td>
                            <td style="color:#22b14c;">{{$singer->phone ? $singer->phone :'لم يتم تسجيل رقم جوال لهذا المطرب'}}</td>
                        </tr>
                        
                      
                        
                        
                        
                        
                        @else
                            <tr style="color:#8B0000;">
                                هذا المطرب غير متاح بعد الان
                            </tr>
                        @endif
                    </table>
                </td>
            </tr>
            <tr class="text-tabel">
                <td>
                    <p>

                      <b>
                            بعون الله تم الاتفاق بين الطرفين علي الشروط التالية:

                            </b>
                                                <br style="display: inherit;" />
                        يتعهد الطرف الثاني
                        بأحياء المناسبة الواقعة في دولة
                        <span class="city"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                            <i>{{ $order->country->name }}</i></span>
                        بمدينة
                        <span class="in-city"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                            <i>{{ $order->city->name }}</i></span>
                        بمنطقة
                        <span class="ctry"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                            <i>{{ $order->states->name }}</i></span>

                        بحي
                        <span class="street"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                            <i>{{ $order->street_name }}</i></span>
                        بتاريخ
                        <span class="data-h"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                            <i>{{ ArabicDate($order->hejry_date) }}</i></span>
                        الموافق
                        <span class="date-m"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                            <i>{{ ArabicDate($order->date) }}</i></span>
                        @php

                        $find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
                        $replace = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
                        $ar_day_format = \Carbon\Carbon::parse($order->date)->format('D'); // The Current Day
                        $ar_day = str_replace($find, $replace, $ar_day_format);

                        @endphp
                        
                        
                        
                        
                        
                        
                        ليوم
                        <span class="day-t"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                            <i>{{$order->day}} </i></span>
                        و يكون الحضور فى تمام الساعة
                        <span class="start-time"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                            <i>{{\Carbon\Carbon::parse($order->start_time)->format('h:i a')}}</i></span>
                        و ينتهى فى تمام الساعة
                        <span class="left-time"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                            <i>{{\Carbon\Carbon::parse($order->end_time)->format('h:i a')}}</i></span>
                        و عدد ساعات العمل
                        <span class="left-time"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                            <i>5 ساعات</i></span>

                    @if($order->canceled == 1)
                                 تم اللغاء الحفلة
                           <span class="start-time"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                            <i>{{$order->updated_at->toDateString()}}</i></span>
                                       
                                       @elseif($order->closed == 1)
                                                                        تم اغلاق الحفلة
                           <span class="start-time"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                              <i>{{$order->updated_at->toDateString()}}</i></span>
                                
                                       @elseif($order->delied == 1)
                                
                                                                 تم تأجيل الحفلة
                           <span class="start-time"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                            <i>{{$order->updated_at->toDateString()}}</i></span>
                                
                                @else
                                
                                
                                @endif
                        حيث أن الطرف الاول اقر بان لديه تصريح صادر من
                        <span class="left-time"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                            <i>{{ $order->permits}} </i></span>


                        حيث تم الاتفاق على المبلغ
                        <span class="left-time"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                            <i>{{ $order->price}} </i></span>



                        @if($order->new_date)
                        لقد تم تأجيل العقد ليوم
                        <span class="data-h"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                            <i>{{ ArabicDate($order->new_date) }}</i></span>
                        وسبب التأجيل هو
                        <span class="hotel-name"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                            <i>{{$order->reason_of_edit}}</i></span>
                        <br /><br />
                        @endif

                    </p>
                </td>
            </tr>

            <tr>
                <td>
                    <br /> <br />
               <span style="text-decoration: underline;">         الشروط التى تمت الموافقة عليها :</span>
                </td>
            </tr>
            <tr>
                <td>
                    <ul>
                        @if($order->singer_gender == '1' || $order->singer_gender == '0')

                        @if($order->singer_gender == '0')
                        @php
                        $conds= \App\ConditionMsingerCompany::where('user_id',$order->singer_id)->orderBy('created_at','DESC')->get();
                        $counter =1;
                        @endphp
                        @foreach($conds as $Condition)
                        <li>{{$counter ++}}- {{$Condition->condition   }}</li>
                        @endforeach
                        @else
                            @php
                                $conds=\App\ConditionFsingerCompany::where('user_id',$order->singer_id)->orderBy('created_at','DESC')->get();
                                $counter =1;
                            @endphp
                        @foreach($conds as $Condition)
                        <li>{{$counter ++}} - {{$Condition->condition   }}</li>
                        @endforeach
                        @endif


                        @else
                        @php
                        $conds = \App\ConditionCompany::orderBy('created_at','DESC')->get();
                        $counter =1;
                        
                        
                        @endphp
                        
                        @foreach($conds as $Condition)
                        <li>{{$counter ++}}- {{$Condition->condition  }}</li>
                        @endforeach
                        @endif
                    </ul>
                </td>
            </tr>




                       <table class="table-sc">
                <tr>
                    <td>

                                  @if($order->singer_gender == 0 || $order->singer_gender == 1)

<h4 style="text-decoration: underline;"> الطرف  الأول العميل</h4>
                    @elseif($order->singer_gender == '0')


<h4 style="text-decoration: underline;"> الطرف  الأول العميل</h4>
@elseif($order->singer_gender == '1')
<h4 style="text-decoration: underline;"> الطرف  الأول العميل</h4>
                    @endif
                    </td>
                </tr>
                <tr class="details-client">
                    <td>
                        <!--<table>-->
                    </td>
                </tr>
                <tr>

                    <td>
                        <label>الاسم</label>
                    </td>
                    <td>
                        <!--<h5>{{$Remittance->sender_name}}</h5>-->
                                                {{ $order->company_name }}

                    </td>


                </tr>
                <tr>
                    <!--<td>-->
                    <!--    <label>التوقيع</label>-->
                    <!--</td>-->
                    <td>
                        <!--<h5>{{$Remittance->bank_name}}</h5>-->
                    </td>
                </tr>
            </table>


            <!-- البدايه  -->
            <table class="table-sc">
                <tr>

                    <td>
                        <h4 style="text-decoration: underline;"> ادارة اعمال المطرب او المطربة </h4>
                    @if(\App\Models\Modrator::where('user_id',$order->singer_id)->first())
                    <table>

                        <td>
                            <label>الاسم</label>
                        </td>
                        <td>

                      @if($order->singer_gender == 0 ||  $order->singer_gender == 1)

 <h5 style="margin: 14px 0 0;">{{$order->singer_name}}</h5>
                            
                            
                            
                             @php
                            
                            $singer = \App\User::where('id',$order->singer_id)->first();

                            @endphp
                            
                            
                            @if($singer != null)
                            <img class="sign" src ="https://marina-al-gharbia.com/storage/settings/June2021/G2EsXAZRmW11u3YkhdMs.png" />
                           @endif
                            
                            
@else
                           
                            <h5 style="margin: 14px 0 0;">فرقة مارينا الغربية</h5>
                            <img class="sign" src ="{{  asset('storage/'.setting('site.marina_contract_image')) }}" />
                            

@endif

@else
                                                 @if($order->singer_gender == 0 ||  $order->singer_gender == 1)


                            <h5 style="margin: 14px 0 0;">فرقة مارينا الغربية</h5>
                            <img class="sign" src ="{{  asset('storage/'.setting('site.marina_contract_image')) }}" />
@endif
                            

                        </td>
                    </table>
                    @endif
                    </td>
                </tr>
            </table>
            </table>





            </td>
            </tr>

            <!--النهاية -->

            <!--<tr>-->
            <!--  <td>-->
            <!--      <p>-->
            <!--          <i>اقرار مرسل العربون:</i> -->
            <!--          {{trans('front.confirmation_deposit_text')}}-->
            <!--        </p>-->
            <!--    </td>-->
            <!--</tr>-->
            <!--<tr>-->
            <!--  <td>-->
            <!--      <p>-->
            <!--          <i>تم طباعة هذا العقد الإلكترونى من موقع مارينا:</i> -->
            <!--             بعد استلام العربون الخاص بكم وتتعهد فرقة مارينا باحياء الحفل بعون الله حسب المتفق عليه-->
            <!--        </p>-->
            <!--    </td>-->
            <!--</tr>-->

            <!--</table>-->
            <div class="col-xs-12"><button onClick="myFunction()" class="btn-print" id="doPrint" >طباعة</button></div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(window).load(function() {
        $('.loader').fadeOut(500);
    });


    function myFunction() {
        window.print();
    }
    //$('.btn-print').on('click', function() {
    // window.print();
    // return false; // why false?
    //});
</script>
<style>
    @media print {

        footer,
        .chatLive,
        header,
        .btn-print,
        .whatsapp-icon {
            display: none !important;
        }

        .title.title-singer {
            display: none;
        }

        .content.bg {
            padding: 0;
        }
</style>
@endpush
