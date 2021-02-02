@component('mail::message')

Bienvenido al Taller Atelier,<br>

Para confirmar tu usuario presiona en el siguiente enlace.

@component('mail::button', ['url' => $url])
Activar
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
