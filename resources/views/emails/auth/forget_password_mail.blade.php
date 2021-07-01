@component('mail::message')

Hello {{$user_name}} 

@component('mail::button', ['url' => route('getResetPassword',$reset_code)])
Click here to reset your password
@endcomponent
<p>Or copy & paste the following link to your browser</p>
<p><a href="{{route('getResetPassword',$reset_code)}}">{{route('getResetPassword',$reset_code)}}</a></p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
