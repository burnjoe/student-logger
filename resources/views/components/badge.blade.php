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

<span {{$attributes->merge(['class' => "text-darkGray bg-lightGray rounded-md " .$fontWeight. " py-1 px-3 " .$size])}}>
    {{ $slot }}
</span>