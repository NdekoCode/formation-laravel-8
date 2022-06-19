@component('mail::message')
# Bienvenus sur notre site

Bienvenus sur notre application Laravel

@component('mail::button', ['url' => '/'])
Accuiel du site
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
