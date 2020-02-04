@component('mail::message')
Hello **{{$name}}**,  {{-- use double space for line break --}}
Thank you for registering to IVub System!

Click below to vote
@component('mail::button', ['url' => $link])
Voting portal
@endcomponent
Sincerely,
IVuB team.
@endcomponent
