@extends('layouts.app')

@section('header')
<span>فـرقــة مــاريـنـــا الـغــربـيـــة</span>
@endsection

@section('content')

<div class="col-xs-12">
    <div class="title title-singer">
        <ul>
            <li><img src="{{ url('images/singer.png') }}" alt="" /></li>
            <li><img src="{{ url('images/singer-icon.png') }}" alt="" /></li>
        </ul>
        <h1 class="border-grad">شروط وبنود العقد</h1>
    </div>
</div>


<div class="col-xs-12">
    <h1 class="title-table wow animation-div">الطرف الاول</h1>
    <div class="contract box wow animatio wow animation-div">
        <table>
            <tbody>
                <tr>
                    <td>م</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>رقم العقد</td>
                    <td>{{ $order->code_number }}</td>
                </tr>
                <tr>
                    <td>تاريح تحرير العقد</td>
                    <td>{{ $order->hejry_date }}</td>
                </tr>
                <tr>
                    <td>إسم العريس الاول</td>
                    <td>{{ $order->name_bridal }}</td>
                </tr>
                <tr>
                    <td>الجنيسة</td>
                    <td>{{ $order->nationalty }}</td>
                </tr>
                <tr>
                    <td>رقم الهوية</td>
                    <td>{{ $order->identity_source }}</td>
                </tr>
                <tr>
                    <td>تاريخ الميلاد</td>
                    <td>{{ $order->birthday }}</td>
                </tr>
                <tr>
                    <td>المبلغ المتفق عليه خارج الزفة</td>
                    <td>{{ $order->agreements['price'] }}</td>
                </tr>
                <tr>
                    <td>العربون المدفوع</td>
                    <td>{{ $order->agreements['deposit'] }}</td>
                </tr>
                <tr>
                    <td>العربون المتبقي</td>
                    <td>{{ $order->agreements['remaining_amount'] }}</td>
                </tr>
                <tr>
                    <td>عدد ساعات العمل</td>
                    @php

                    $start = strtotime($order->start_time);
                    $end=  strtotime($order->end_time);
                    $diff= $start-$end;
                    $timeElapsed= gmdate("h:i",$diff);
                    @endphp
                    <td> {{ $timeElapsed }} ساعات </td>
                </tr>
                <tr>
                    <td>قيمة زيادة الساعة الواحدة</td>
                    <td>2500 ريال</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
