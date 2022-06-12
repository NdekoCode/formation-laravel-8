@component('mail::message')
    # Introduction

    Le corps de votre message

    @component('mail::button', ['url' => $url])
        Cliquez ici
    @endcomponent

    Merci,<br>
    {{ config('app.name') }}
@endcomponent
