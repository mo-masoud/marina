@component('mail::message')
# منصة الصفوة

تم اضافة منافسة جديدة مرتبطة بأهتماماتك


@component('mail::button', ['url' => 'tenders1'])
المنافسات الحكومية
@endcomponent
@component('mail::button', ['url' => 'tenders2'])
المنافسات الخاصة
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
