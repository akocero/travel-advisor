@component('mail::message')
    # Vistors Details
    Name: {{ $data['name'] }}

    Message:
    {{ $data['message'] }}
@endcomponent
