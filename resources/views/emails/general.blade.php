@component('mail::message')

{{$data['body']}}

Thanks,<br>
{{ $data['app_name'] }}
@endcomponent
