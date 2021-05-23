@component('mail::message')
# مرحبا بك

لقد تم تسجيلك بنجاح في منصة الصفوة للمنافسات الحكومية والخاصة
@component('mail::button', ['url' => 'home'])
منصة الصفوة
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
