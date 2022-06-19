@component('mail::message')
# Bienvenus sur notre site

Bienvenus **{{ $user->name }}** sur notre site Web

@component('mail::button', ['url' => '/'])
Accuiel du site
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
