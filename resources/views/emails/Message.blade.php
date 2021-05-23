@component('mail::message')
# موقع فرقة مارينا الغربية

لديك رسالة جديدة


<h3>عنوان الرسالة</h3> : <h1>{{$subject}}</h1>


<h3>محتوي الرسالة : </h3> <p>{{$title}}</p>


Thanks,<br>
{{ Auth::user()->name }}
@endcomponent
