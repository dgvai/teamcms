@component('mail::message')
# {{$data['app_name']}}

{{$data['body']}}

Thanks,<br>
{{ $data['app_name'] }}
@endcomponent
