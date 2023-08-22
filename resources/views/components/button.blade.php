@props([
    'textColor' => 'text-white',
    'bgColor' => 'bg-green',
    'onHover' => 'hover:bg-lightGreen',
    'rounded' => 'rounded-full',
])

<button {{ $attributes->merge(['class' => 'px-6 py-2 ' .$rounded. ' transition-all ' . $textColor . ' ' . $bgColor . ' ' . $onHover]) }}>
  {{ $slot }}
</button>