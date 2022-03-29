@component('mail::message')
    # Vistors Details
    Name: {{ $data['name'] }}
    Email: {{ $data['client_email'] }}

    Message:
    {{ $data['message'] }}
@endcomponent
