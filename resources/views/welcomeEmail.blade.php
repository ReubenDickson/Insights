@component('mail::message')
# MYCIA - Welcome to the Platform!

MYCIA is a decentralized learning and earning platform, which gives you an opportunity to learn and earn.
Upgrade now by making your one-time payment which gives you a lifetime access to our premium courses and signals.
Moreso, earn by sharing this with your friends. Its so easy!

@component('mail::button', ['url' => ''])
Start Now!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
