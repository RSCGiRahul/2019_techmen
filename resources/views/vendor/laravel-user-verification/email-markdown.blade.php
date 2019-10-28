@component('mail::message')

You have assign a new user in Our website  Please click here to login into our system!

@component('mail::button', ['url' => route('email-verification.check', $user->verification_token) . '?email=' . urlencode($user->email) ])
Click here to verify your account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
