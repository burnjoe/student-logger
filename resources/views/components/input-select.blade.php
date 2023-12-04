@props([
    'messages' => '',
    'bgColor' => 'bg-white',
])

@php
$errorStyle = $messages ? 'bg-veryLightRed border-red text-darkRed placeholder-darkRed' : 'text-veryDarkGray border-gray border-gray';
@endphp

<select {{ $attributes->merge(['class' => 'border text-sm rounded-md block w-full px-4 py-1.5 cursor-pointer '. $bgColor .' '. $errorStyle]) }}>
    {{ $slot }}
</select>