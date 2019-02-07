@component('mail::message')
# Welcome to {{ config('app.name') }}

###Login Details
You email address
Password: {{ $password }}

@component('mail::table')
|        		| Start		    | End	   |
| ------------- |:-------------:| --------:|
| Early		    | 12:00 PM	    | 13:00 PM |
| Evening     	| 20:00 PM 		| 21:00PM  |
@endcomponent



Thanks,<br>
{{ config('app.name') }}
@endcomponent
