@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Сайн байна уу!')
@endif
@endif

{{-- Intro Lines --}}
{{"Нууц үг сэргээх товчийг дарж нууц үгээ сэргээнэ үү"}}
{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ "Нууц үг сэргээх" }}
@endcomponent
@endisset

{{-- Outro Lines --}}

{{ "Энэхүү нууц үг сэргээх товч нь 60 минутын дотор ашиглах боломжтой" }}



{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Хүндэтгэсэн'),<br>
{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    "Хэрэв Нууц үг сэргээх товчийг дархад алдаа гарсан бол доорх линкийг хөтчийн линк хэсэгт хуулж холбогдоно уу  \":actionText\" \n",
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset
@endcomponent
