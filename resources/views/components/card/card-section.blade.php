@props([
    'bgColor' => 'bg-white',
])

<div {{ $attributes->merge(['class' => 'px-6 py-4 ' . $bgColor]) }}>
  {{ $slot }}
</div>