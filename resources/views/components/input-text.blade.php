@props([
    'alignIcon' => 'none',
    'disabled' => false,
    'messages' => '',
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

$errorStyle = $messages ? 'bg-veryLightRed border-red text-darkRed placeholder-darkRed' : 'text-veryDarkGray border-gray';
@endphp

<div class="relative text-sm">
  @if (isset($slot) && $alignIcon !== 'none')
    <div class="flex absolute {{ $messages ? 'text-darkRed' : null }} inset-y-0 items-center {{ $alignmentClasses }}">
      {{ $slot }}
    </div>
  @endif
    <input {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['class' => 'w-full border text-sm ' .$errorStyle. ' rounded-md ' .$inputPadding]) }} />
</div>