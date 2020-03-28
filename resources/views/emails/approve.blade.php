@component('mail::message')
# You have been APRROVED!

Your request to join {{config('app.name')}} has been verified and you have been approved! Login now to get started with the community!

@component('mail::button', ['url' => route('login')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
