@extends('layouts.app')

@section('content')


                            @php

                              $find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
                              $replace = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
                              $ar_day_format = \Carbon\Carbon::parse($order->date)->format('D'); // The Current Day
                              $ar_day = str_replace($find, $replace, $ar_day_format);

                           @endphp
 <!--<div class="col-xs-12 wow fadeInDownBig" style="visibility: visible;">
  <div class="title title-singer">-->
<!--        <ul>-->
<!--          <li><img src="{{ url('images/singer.png') }}" alt=""></li>-->
<!--        </ul>-->
<!--       <h1 class="border-grad">{{ trans('front.print') }}</h1>-->
<!--    </div>-->
<!--</div>-->

<div class="col-xs-12">
    <div class="contract-view print-n " id="printDiv">
      <div class="logo-print">
         {{-- 
         
         
         
         @if($order->singer_gender == 'male' || $order->singer_gender == 'female')
        	<!--<img src="{{ url('images/logo-p.png') }}" />-->
        	          </p> <img src="{{  asset('storage/'.setting('site.marina_contract_image')) }}" />

          @endif
              @if($order->provided_by_marina==0)
              
          @if($order->singer_gender == '1' || $order->singer_gender == '0' )

        	<img src="{{ asset('storage/'.App\User::find($order->user_id)->first()->logo) }}" />

          @endif

                  @else
                  <img src="{{ asset('storage/'.setting('site.marina_contract_image'))}}" /> 

          @endif
          
          --}}
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
                              {{--<td><span class="date-con">{{ $order->created_at->format('F jS, Y') }}</span></td>--}}

                              <td><span class="date-con">{{ $order->created_at->format('Y/m/d') }}</span></td>
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
                                          @if($order->provided_by_marina==0&&isset($singer->logo))
                                     {{-- @if($order->singer_gender == 'male' || $order->singer_gender == 'female')
                                        <li><img src="{{ url('images/singer.png') }}" alt=""></li>
                                          @endif
                                          @if($order->singer_gender == '1' || $order->singer_gender == '0')--}}

                                        <li><img src="{{ asset('storage/'.$singer->avatar) }}" alt=""></li>
                                      {{--  @endif--}}
                                          @else
                                            <li> <img src="{{url('images/singer.png') }}" /></li>
                                          @endif

                                              @if($order->provided_by_marina==1)
                                             
                                                  @endif

                                         <li> <img src="" /></li>
                                     
                                      </ul>
                                  </div>
                                </td>

                          </tr>
                          <tr>
                              <td>
                                  <span class="type-title">
                                <div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                <i>
                                نوع المناسبة
                                </i>
                                </span></td>
                              <td><span class="content-type">{{ $order->occasions->name}}</span></td>
                              <td><span class="type-title">
                                <div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                <i>عدد العرسان </i></span></td>
                                
                                
                                
                              <td><span class="content-type">{{$order->grooms()->count() + $order->number_bridal }}</span></td>
                              <!--<td><span class="type-title"><div class="img"><img src="{{ url('images/gray.png') }}" /></div>-->
                              <!--  <i>رقم العقد </i> </span></td>-->
                              <!--<td><span class="content-type">{{ $order->code_number }}</span></td>-->
                          </tr>
                          <tr>
                              <td>الطرف الأول :</td>

                              <!--<td colspan="2"><span class="type-title"><div class="img"><img src="{{ url('images/gray.png') }}" /></div>-->
                              <!--  <i>البيانات الشخصية لصاحب العقد</i></span></td>-->
                              <!--<td colspan="2"><span class="type-title"><div class="img"><img src="{{ url('images/gray.png') }}" /></div>-->
                              <!--  <i>البريد الالكتروني</i></span></td>-->
                              <!--<td colspan="3"><span class="content-type">{{ $order->user->email }}</span></td>-->
                              <!--<td rowspan="2"><img class="logo-table" src="{{ Voyager::image($order->user->logo) }}" alt="{{ $order->user->name }}" /></td>-->
                          </tr>
                      </table>
                  </td>
              </tr>

              <tr class="head-center">
                <td>
                      <table class="table-center">
                          <tr>
                              <th class="td-catch" ><div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                <i>م</i></th>
                              <th><div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                <i>الاسم الرباعي</i></th>

                              <th><div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                <i>رقم الهوية</i></th>
                                
                            <th>
                                <div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                            
                                <i>تاريخ الميلاد</i></th>
                                
                              <th><div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                <i>الجنسية</i></th>

                              <th><div class="img"><img src="{{ url('images/gray.png') }}" /></div> 
                                <i>مصدرها</i></th>
                                
                              <th><div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                <i>رقم الجوال</i></th>
                                
                          </tr>
                          
                          <tr>
                              <td class="td-catch">1</td>
                              
                              <td>{{ $order->name_bridal ?? "" }}</td>
                              
                              
                              <td>{{ $order->identity ?? "" }}</td>
                              
                              
                              <td>{{ $order->birthday ?? "" }}</td>
                              
                              <td>{{ nationalityName($order->nationality) ?? "" }}</td>
                              
                              <td>{{ $order->identity_source ?? "" }}</td>
                              
                              <td>{{ $order->phone ?? "" }}</td>
                          </tr>
                          
                          @foreach($order->grooms as $groom)
                          
                          <tr>
                              <td>1</td>
                              <td>{{ $groom->name }}</td>
                              
                             <td>{{ $groom->identity }}</td>
                              <td>{{ $groom->birthday }}</td>
                              
                               <td>{{ nationalityName($order->nationality) }}</td>
                                <td>{{ $groom->identity_source }}</td>
                              <!--<td>{{ $order->identity_source }}</td>-->
                          </tr>
                          
                          @endforeach
                          
                          
                          
                          
                          <tr>
                              <td>2</td>
                            <th><div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                <i>البريد الإلكتروني</i></th>
                              <td>{{ \App\User::find($order->user_id)->email }}</td>
                              <td></td>
                             <th><div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                <i>رقم جوال العريس </i></th>
                              <td>{{ $order->phone_bridal }}</td>

                          </tr>
                      </table>
                  </td>
              </tr>


  <tr class="title-h">
                <td>الطرف الثاني</td>
              </tr>

          @if($order->singer_gender == 'male' || $order->singer_gender == 'female')
              <tr class="head-center">
                <td>
                  <table class="table-center">
                    <tr>
                        <th><div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                          <i>البند</i></th>
                        <th><div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                          <i>الاسم الرباعي</i></th>
                        <th><div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                          <i>رقم الهوية</i></th>
                        <th><div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                          <i>الوظيفة</i></th>
                        <th><div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                          <i>رقم العضوية</i></th>
                        <th><div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                          <i>إنتماء العضو أو الفرقة</i></th>
                        <th><div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                          <i>مصدرها</i></th>
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

          @if($order->singer_gender == 'male')

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
                        <th><div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                          <i>م</i></th>
                        <th><div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                          <i>البيان </i></th>
                        <th><div class="img"><img src="{{ url('images/gray.png') }}" /></div>


                                                @if($order->singer_gender == 'male')
                          <i>اسم المطرب </i></th>
                           @else
                          <i>اسم المطربة </i></th>
                           @endif



                        <th><div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                          <i>نوع الكورال</i></th>

                       <th colspan="2">تاريخ المناسبة<div class="img"><img src="https://marina-al-gharbia.com/images/gray.png"></div></th>


                        <th>
                            
                            <div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                        
                          <i>   ليوم</i>
                          
                          
                          
                          </th>
                        <th><div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                          <i>الأوقات</i></th>
                        <th><div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                          <i>الساعة</i></th>
                    </tr>
                    <tr>
                        <td style="color:#22b14c;">1</td>

                             @if($order->singer_gender == 'male')
                        <td style="color:#22b14c;"> إسم المطرب الاساسي </td>
                           @else
                        <td style="color:#22b14c;"> إسم المطربة الاساسية </td>
                           @endif
                        @php
                        $singer = \App\User::find($order->singer_id);
                        
                        @endphp
                    @if($singer != null)
                        <td style="color:#22b14c;">{{$order->singer_name}} </td>
                        
                        @else
                        
                        <td style="color:#8B0000;">لم يعد هذا المطرب موجود</td>
                        
                        @endif
                        <td rowspan="2" style="color:#22b14c;"> {{$order->carol_type}}</td>

                        <td style="color:#22b14c;">ميلادى</td>
                        <td style="color:#22b14c;">{{ ArabicDate($order->date) }}</td>
                        <td style="color:#22b14c;">{{$order->day ? $order->day : ''}}</td>
                        <td style="color:#22b14c;">  وقت الحضور  </td>
                        <td style="color:#22b14c;">{{\Carbon\Carbon::parse($order->start_time)->format('h:i a')}}</td>
                    </tr>
                    <tr>
                        <td style="color:#22b14c;">2</td>

                                                                     @if($order->singer_gender == 'male')
                <td style="color:#22b14c;"> إسم المطرب الاحتياطي</td>
                @else
                                        <td style="color:#22b14c;"> إسم المطربة الاحتياطية </td>
                                           @endif
                



                        <td style="color:#22b14c;">{{isset($order->singer_name_optional) ?  $order->singer_name_optional : 'لا يوجد'}}</td>



                        <td style="color:#22b14c;"> هجرى</td>
                        <td style="color:#22b14c;">{{ArabicDate($order->hejry_date)}}</td>
                        <td style="color:#22b14c;">{{$order->day ? $order->day : ''}}</td>
                        <td style="color:#22b14c;">  وقت المغادرة</td>
                        <td style="color:#22b14c;">{{\Carbon\Carbon::parse($order->end_time)->format('h:i a')}}</td>
                    </tr>



                </table>
                  </td>
              </tr>
              <tr class="text-tabel">
                <td>
                      <p>

                      <b>  بعون الله تم الاتفاق بين الطرفين علي الشروط التالية:</b>
                             </p>
<p>


يتعهد الطرف الثاني بأحياء المناسبة


                             في دولة
                           <span class="city"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                                <i>{{ $order->country->name }}</i></span>

                                                            بمنطقة
                           <span class="ctry"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                                <i>{{ $order->states->name }}</i></span>

                           بمدينة
                           <span class="in-city"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                                <i>{{ $order->city->name }}</i></span>
                                                                                                                <br style="display: inherit;" />

                           بحي
                           <span class="street"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                                <i>{{ $order->street_name }}</i></span>




                           بفندق
                           <span class="hotel-name"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                                <i>{{$order->hotel_name}}</i></span>

                           بقاعة

                           <span class="place"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                                <i>{{$order->hall_id}}</i></span>
                            الشروط
                           <span class="start-time"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                                <i>تم الموافقة عليها</i></span>
                                
                                @if($order->canceled == 1)
                                 تم اللغاء الحفلة
                           <span class="start-time"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                            <i>{{$order->updated_at->toDateString()}}</i></span>
                                       
                                       @elseif($order->closed == 1)
                                                                        تم اغلاق الحفلة
                           <span class="start-time"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                              <i>{{$order->updated_at->toDateString()}}</i></span>
                                
                                       @elseif($order->delied == 1)
                                
                                
                                 لقد تم تأجيل الحفل ليوم
                          <span class="start-time"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                            <i>{{ArabicDate($order->new_date)}}</i></span>
                            وسبب التأجيل هو
                            <span class="hotel-name"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                              <i>{{$order->reason_of_edit}}</i></span>
                              <br/><br/>
                                
                           
                                
                                @else
                                
                                
                                @endif
                                
                               

                                
                                

                           نوع الطرب
                           <span class="singer-name-s"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                                                    @if($order->music==0)


                                <i>موسيقى</i></span>
@endif
                          @if($order->music==1)

                                <i>الاثنان معا</i></span>
@endif
                          @if($order->music==2)
                                  <i>  بدون موسيقي</i></span>

                          @endif
 {{--
                          @if($order->new_date)
                          لقد تم تأجيل العرس ليوم
                          <span class="data-h"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                            <i>{{ ArabicDate($order->new_date) }}</i></span>
                            وسبب التأجيل هو
                            <span class="hotel-name"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                              <i>{{$order->reason_of_edit}}</i></span>
                              <br/><br/>
                            @endif
                         
                            علي ان يكون نوع الطرب
                           <span class="music-type"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                                <i>بالموسيقية</i></span>
                        --}}

                      </p>
                  </td>





                  {{--@if(!empty(App\Models\Grooms::where('order_id',$order->id)->where('approved',1)->get()))
            <div class="text-tabel">
                <td>
                    <p>

                        <b>  وتم اضافه العرسان الاتيه</b>
                    </p>
                    <p>--}}

{{--@foreach(App\Models\Grooms::where('order_id',$order->id)->where('approved',1)->get()  as $groom)


                            الاسم
                            <span class="city"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                                <i>{{ $groom->name }}</i></span>

                            رقم الهويه
                            <span class="ctry"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                                <i>{{ $groom->identity }}</i></span>

                            تاريخ الميلاد
                            <span class="in-city"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                                <i>{{ $order->created_at->format('Y/m/d')}}</i></span>
                            <br style="display: inherit;" />




                        @endforeach


                    </p>
                </td>
            </div>

@endif--}}
              </tr>


       {{--     <tr class="text-tabel">
                <td>
                    <p>

                        <b> وتم اضافه العرسان الاتيه</b>
                    </p>
                    <p>


                       @foreach($order->grooms as $groom)


   الاسم
                        <span class="city"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                                <i>{{ $groom->name }}</i></span>

                       رقم الهويه
                        <span class="ctry"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                                <i>{{ $groom->identity }}</i></span>

                       تاريخ الميلاد
                        <span class="in-city"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                                <i>{{ $order->created_at->format('Y/m/d')}}</i></span>
                        <br style="display: inherit;" />




@endforeach


                    </p>
                </td>
            </tr>
--}}




              <tr>
                <td>
                    وتم اختيار الالات الاتية
                  </td>
              </tr>
              <tr>
                <td>



                <!--<div class="machis-box">
                    <div class="mach-box">
                      <input type="checkbox" id="test1" name="checkbox-group" checked>
                      <label for="test1">عازف عود</label>
                    </div>
                    <div class="mach-box">
                      <input type="checkbox" id="test2"  name="checkbox-group">
                      <label for="test2">عازف جيتار</label>
                    </div>
                    <div class="mach-box">
                      <input type="checkbox" id="test3" name="checkbox-group" checked>
                      <label for="test3">عازف مزمار يمني</label>
                    </div>
                    <div class="mach-box">
                      <input type="checkbox" id="test4" name="checkbox-group" >
                      <label for="test4">عازف بزق</label>
                    </div>
                    <div class="mach-box">
                      <input type="checkbox" id="test5" name="checkbox-group" checked>
                      <label for="test5">عازف مزمار يمني</label>
                    </div>
                    <div class="mach-box">
                      <input type="checkbox" id="test6" name="checkbox-group">
                      <label for="test6">عازف قانون</label>
                    </div>
                </div>
                -->





                    <table class="table-center">
                        <!--<tr>-->
                        <!--  @if($order->machines)-->
                        <!--    @foreach($order->machines as $machines)-->
                        <!--      <th><div class="img"><img src="{{ url('images/gray.png') }}" /></div>-->
                        <!--          <i>{{$machines}}-->
                        <!-- </i></th>-->
                        <!--    @endforeach-->
                        <!--  @endif-->

                        <!--  @if($order->rhythms)-->
                        <!--    @foreach($order->rhythms as $rhythms)-->
                        <!--      <th><div class="img"><img src="{{ url('images/gray.png') }}" /></div>-->
                        <!--          <i>{{$rhythms}}-->

                        <!--                                   </i></th>-->

                        <!--    @endforeach-->
                        <!--  @endif-->
                        <!--</tr>-->
                                           <tr>
                                               @foreach(\App\Models\Machine::all() as $machine)

                        <th><div class="img"><img src="https://marina-al-gharbia.com/images/gray.png"></div>
                                  <i> {{$machine->name}}
                         </i></th>


                                                   @endforeach
                                             </tr>
 @if(isset($order->machines))

                                            <tr>
                                                @foreach(App\Models\Machine::all() as $machine)
                        <td>
                            @if(in_array($machine->name,$order->machines))
                            <span><I class="fa fa-check"></I></span>
                            @endif
                        </td>
              @endforeach

                     </tr>
                            @endif

                      </table>



                  </td>
              </tr>



              <tr>
                <td>
                    وتم اختيار الإيقاعات الاتية
                  </td>
              </tr>
              <tr>
                <td>
                      <table class="table-center">
                        <!--<tr>-->
                        <!--  @if($order->machines)-->
                        <!--    @foreach($order->machines as $machines)-->
                        <!--      <th><div class="img"><img src="{{ url('images/gray.png') }}" /></div>-->
                        <!--          <i>{{$machines}}-->
                        <!-- </i></th>-->
                        <!--    @endforeach-->
                        <!--  @endif-->

                        <!--  @if($order->rhythms)-->
                        <!--    @foreach($order->rhythms as $rhythms)-->
                        <!--      <th><div class="img"><img src="{{ url('images/gray.png') }}" /></div>-->
                        <!--          <i>{{$rhythms}}-->

                        <!--                                   </i></th>-->

                        <!--    @endforeach-->
                        <!--  @endif-->
                        <!--</tr>-->
                                            <tr>

                        <th><div class="img"><img src="https://marina-al-gharbia.com/images/gray.png"></div>
                                  <i> شباب عدة
                         </i></th>
                        <th><div class="img"><img src="https://marina-al-gharbia.com/images/gray.png"></div>
                                  <i> إيقاعات عادية
                         </i></th>
                        <th><div class="img"><img src="https://marina-al-gharbia.com/images/gray.png"></div>
                                  <i> بنات عدة
                         </i></th>
                        <th><div class="img"><img src="https://marina-al-gharbia.com/images/gray.png"></div>
                                  <i>  إيقاعات سامبر
                         </i></th>


                                             </tr>

                        <tr>
                             @if(isset($order->rhythms))

                            <td>

                            @if(in_array("شباب عده",$order->rhythms))
                                <span><I class="fa fa-check"></I></span>
                            @endif

                            </td>

                            <td>

                            @if(in_array("ايقاعات عادية",$order->rhythms))
                                <span><I class="fa fa-check"></I></span>
                            @endif

                            </td>

                            <td>

                            @if(in_array("بنات عدة",$order->rhythms))
                                <span><I class="fa fa-check"></I></span>
                            @endif

                            </td>

                            <td>

                            @if(in_array("ايقاعات سامبلر",$order->rhythms))
                                <span><I class="fa fa-check"></I></span>
                            @endif

                            </td>
                            @else

                                                     {{--   <td>


                            </td>

                            <td>

                            </td>--}}



                               @endif

                        </tr>




                      </table>



                  </td>
              </tr>
              <!--<tr>-->
                <!--<td>-->
                <!--    الاتفاقات المالية-->
                <!--  </td>-->
              <!--</tr>-->
              <tr>
                <td>
                    <p class=" prag-inline">
                        عدد الزفات
                          <span class="num-z"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                                <i>{{$order->agreements['number_of_hits']}}</i></span>
    الاولى تكون مجانا و الثانية بى
                          <span class="num-z"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>

                          <i>    1000 ريال   </i></span>

                          قيمة  تشغيل شريط الزفة
                                               <span class="num-z"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>

                          <i>500 ريال</i></span>



    
                                    سعر الساعة الاضافية 
                                    
                                               <span class="num-z"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>

                          <i>{{$order->extra_hour_price ? $order->extra_hour_price : 'لم تحدد سعر الساعة الاضافية في هذا العقد'}} ريال</i></span>



                      </p>
                  </td>
              </tr>
              <tr>
                <td>
                    <p class=" prag-inline">
                                    المبلغ الإجمالى المتفق عليه :
                              <span class="total">
                                  <u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                                <i>{{$order->agreements['price']}} ريال لا غير</i></span>
                                </p>
                                <p class=" prag-inline">
                                قيمة العربون حسب المنطقة :
                          <span class="offer-p"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                                <i>{{$order->agreements['deposit']}} ريال لا غير</i></span> </p>
                                <p class=" prag-inline">
                            قيمة المبلغ المتبقى   :
                          <span class="stay-p"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                                <i>{{$order->agreements['remaining_amount']}} ريال لا غير</i></span>

                      </p>

 <p class=" prag-inline">
                    @foreach($order->grooms  as $groom)
                      
                        <span class="stay-p"><u class="img"><img src="{{ url('images/gray.png') }}" /></u>
                                <i>   تم اضافه عريس اخر بقيمه{{$groom->price}} ريال سعودي</i></span>
                       
                    @endforeach
 </p>
                  </td>
              </tr>
              <tr>
                <td style="border: 0px #010101 solid; padding: 10px 18px 20px;">
                  	<br /> <br />
               <span style="text-decoration: underline;">         الشروط التى تمت الموافقة عليها :</span>
                  </td>
              </tr>
              <tr>
                <td>
                    <ul>
                        <!--Check gate if marina-->
                      @if($order->singer_gender == 'male' || $order->singer_gender == 'female')
                      
                      @php
                      $conds = App\ConditionPersonal::orderBy('created_at','DESC')->get();
                      $counter = 1;
                      @endphp
                      
                      
                        @foreach($conds as $Condition1)
                            <li>{{$counter ++}}- {{$Condition1->condition  }}</li>
                         @endforeach
                      @endif

                      <!--Check gate if singer-->
                      @if($order->singer_gender == '0' || $order->singer_gender == '1')
                                    
                          @if($order->singer_gender == '0')
                      
                      
                           @php
                      $conds = \App\ConditionMsingerClient::where('user_id',$order->singer_id)->orderBy('created_at','DESC')->get();
                      $counter = 1;
                      @endphp
                      
                            @foreach($conds as $Condition2)
                                    <li>{{$counter ++}}- {{$Condition2->condition }}</li>
                             @endforeach
                          @else
                            
                           @php
                      $conds = \App\ConditionFsingerClient::where('user_id',$order->singer_id)->orderBy('created_at','DESC')->get();
                      $counter = 1;
                      @endphp
                      
                      
                      
                          
                            @foreach($conds as $Condition3)
                                    <li>{{$counter ++}}- {{$Condition3->condition  }}</li>
                            @endforeach
                          @endif

                      @endif

                      </ul>
                  </td>
              </tr>
              <tr>
                <td style="border:none">
                    <h3> التحويلات المالية </h3>
                  </td>
              </tr>
              <tr class="details-client">
                <td>
                      <table class="table-center">
                        <tr>
                              <th><div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                <i>إسم مرسل العربون</i></th>
                              <th>
                                <i>{{$Remittance->sender_name}}</i></th>
                              <th><div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                <i> القرابة</i></th>
                           {{-- @if(\App\Models\Modrator::where('user_id',$order->singer_id)->first())--}}
                                <th><i>{{$Remittance->relative_relation}}</i></td>
                           {{-- @else--}}
                                                          {{--  <th><i></i></td>--}}

                           {{-- @endif--}}
                        </tr>
                        <tr>
     <th><div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                <i>إسم البنك الذى إرسل منه العربون</i></th>
                                <td><h5>{{$Remittance->bank_name}}</h5></td>
     <th><div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                                رقم حساب مرسل العربون
                            </i></th>
                                                          <td><h5>{{$Remittance->account_number}}</h5></td>

                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="border:none">
                    <h3>اقرار بعدم المطالبة</h3>
                  </td>
              </tr>
            <tr>
                <td>
                    <p>
                        {{trans('front.confirmation_deposit_text')}}
                      </p>
                  </td>
              </tr>

            <tr>
                <td style="border:none">
                    <h3>ارقام الطوارئ للعريس</h3>
                  </td>
              </tr>
            @php $i = 0 ; $x = 0 ; $n = 0 ; @endphp
            @foreach($order->contacts['contact_name'] as $key)
            <tr class="details-client">
                <td colspan="2" style="width: auto; display: table-cell;">الإسم:</td>
                <td colspan="2" style="width: auto; display: table-cell;">
                    <span class="span-t">
                        <div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                        <i>{{$order->contacts['contact_name'][$i++]}}</i>
                    </span>
                </td>
                <td colspan="2" style="width: auto; display: table-cell;">رقم الجوال:</td>
                <td colspan="2" style="width: auto; display: table-cell;">
                    <span class="span-t">
                        <div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                        <i>{{$order->contacts['contact_phone'][$n++]}}</i>
                    </span>
                </td>
                <td colspan="2" style="width: auto; display: table-cell;">صلة القرابة:</td>
                <td colspan="2" style="width: auto; display: table-cell;">
                    <span class="span-t">
                        <div class="img"><img src="{{ url('images/gray.png') }}" /></div>
                        <i>{{$order->contacts['contact_relation'][$x++]}}</i>
                    </span>
                </td>
              </tr>

                          @endforeach


            <table class="table-sc">
                <tr>
                    <td>
                                  @if($order->singer_gender == 'male' || $order->singer_gender == 'female')
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
                        <label>الإسم</label>
                    </td>
                    <td>
                        <!--<h5>{{$Remittance->sender_name}}</h5>-->
                        {{ $order->name_bridal }}
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
                            <label>الإسم</label>
                        </td>
                        <td>


                      @if($order->singer_gender == 'male' ||  $order->singer_gender == 'female')


                            <h5 style="margin: 14px 0 0;">فرقة مارينا الغربية</h5>
                
@else
                            <h5 style="margin: 14px 0 0;">{{$order->singer_name}}</h5>
                            
                            
                            @php
                            
                            $singer = \App\User::where('id',$order->singer_id)->first();

                            @endphp
                            
                            
                            @if($singer != null)
                            <img class="sign" src ="{{  asset('storage/'.$singer->logo) }}" />
                           @endif
                    
@endif


                            @else
                                                 @if($order->singer_gender == 'male' ||  $order->singer_gender == 'female')


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
            
        
        

          </table>
          <div class="col-xs-12"><button onClick="myFunction()" class="btn-print" id="doPrint" />طباعة</button></div>
      </div>
  </div>
@endsection

@push('js')
 <script>

 /*$('.machis-box input').on('click', function (e) {
  e.preventDefault();
})*/



  $(window).load(function () {
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
 footer, .chatLive, header, .btn-print, .whatsapp-icon {
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
