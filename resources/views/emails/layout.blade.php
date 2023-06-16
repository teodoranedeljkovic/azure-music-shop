@component('mail::message')
    {{ $data['subject'] }} <br>

    {{ $data['message'] }}

    {{ $data['name'] }}
@endcomponent
