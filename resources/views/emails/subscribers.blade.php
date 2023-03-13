@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Link:
<a href="{{$link}}">{{$link}}</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
