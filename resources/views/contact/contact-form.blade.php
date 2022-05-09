@component('mail::message')

        <h3> New Message Form : {!! $contact_form_data['email'] !!} </h3>

        Name : {!! $contact_form_data['name'] !!}

        Phome : {!! $contact_form_data['phone'] !!}

        Message : {!! $contact_form_data['message'] !!}

@endcomponent
