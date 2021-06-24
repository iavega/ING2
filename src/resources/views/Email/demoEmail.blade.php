@component('mail::message')
# Hola!

No te preocupes. Para restablecer tu contraseña de APP, haz clic en el siguiente enlace:

@component('mail::button', ['url' => ''])
Restablecer contraseña
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
