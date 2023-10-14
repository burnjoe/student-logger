@props([
    'size' => 'xs',
    'fontWeight' => 'normal',
])

@php
$size = [
    'xs' => 'text-xs',
    'sm' => 'text-sm',
    'md' => 'text-md',
    'lg' => 'text-lg',
    'xl' => 'text-xl',
][$size];

$fontWeight = [
    'light' => 'font-light',
    'normal' => 'font-normal',
    'medium' => 'font-medium',
    'semibold' => 'font-semibold',
    'bold' => 'font-bold',
][$fontWeight];
@endphp

<span {{$attributes->merge(['class' => "rounded-md " .$fontWeight. " py-1 px-4 " .$size])}}>
    {{ $slot }}
</span>