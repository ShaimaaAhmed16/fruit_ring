@component('mail::message')
# Introduction

الثمار الوطنيه جده

{{--@component('mail::button', ['url' => ''])--}}
{{--Button Text--}}
{{--@endcomponent--}}
<p class="text-right"> كود تغيير كلمه السر{{$code}}</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
