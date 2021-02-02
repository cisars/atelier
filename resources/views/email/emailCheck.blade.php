@component('mail::message')
# Introduction

Activar tu cuenta

@component('mail::button', ['url' => $url])
Activar
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
