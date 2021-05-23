@component('mail::message')
# منصة الصفوة

تم اضافة منافسة جديدة مرتبطة بأهتماماتك






<a href="https://alsafwah.info/" class="btn btn-primary">منافسة جديدة</a>
{{--
@component('mail::button', ['url' => 'tenders1'])
المنافسات الحكومية
@endcomponent





@component('mail::button', ['url' => 'tenders2'])
المنافسات الخاصة
@endcomponent
--}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
