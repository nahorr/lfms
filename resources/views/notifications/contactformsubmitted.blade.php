@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Hello Admin!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

@component('mail::button', ['url' => $url])
A New Contact Form Submitted
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
