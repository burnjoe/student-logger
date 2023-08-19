@props([
    'alignIcon' => 'none',
    'disabled' => false,
])

@php
switch ($alignIcon) {
    case 'left':
        $alignmentClasses = 'left-2 ps-2';
        $inputPadding = 'ps-10 pe-4 py-1.5';
        break;
    case 'right':
        $alignmentClasses = 'right-2 pe-2';
        $inputPadding = 'ps-4 pe-10 py-1.5';
        break;
    case 'none':
    default:
        $inputPadding = 'px-4 py-1.5';
        break;
}
@endphp

@if (isset($slot) && $alignIcon !== 'none')
  <span class="flex absolute inset-y-0 items-center {{ $alignmentClasses }}">
    {{ $slot }}
  </span>
@endif
  <input {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['class' => 'w-full border text-sm border-gray rounded-md ' .$inputPadding ]) }} />