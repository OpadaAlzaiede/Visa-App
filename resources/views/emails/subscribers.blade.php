@component('mail::message')
# Introduction

Follow link below to start your application:

Link:
<a href="{{$link}}">{{$link}}</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
