@props([
    'size' => 'xs',
    'fontWeight' => 'normal',
    'padding' => 'py-1 px-3'
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

<span {{$attributes->merge(['class' => "rounded-md " .$fontWeight. " " .$padding. " " .$size])}}>
    {{ $slot }}
</span>