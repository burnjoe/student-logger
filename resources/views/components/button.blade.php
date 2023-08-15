@props([
    'textColor' => 'text-white',
    'bgColor' => 'bg-green',
    'onHover' => 'hover:bg-lightGreen',
])

<button {{ $attributes->merge(['class' => 'px-8 py-2 rounded-full transition-all ' . $textColor . ' ' . $bgColor . ' ' . $onHover]) }}>
  {{ $slot }}
</button>