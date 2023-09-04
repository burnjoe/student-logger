@props([
    'shadow' => 'shadow-lg',
    'bgColor' => 'bg-white',
    'rounded' => 'rounded-lg',
    'padding' => 'px-6 py-4',
])

<div {{$attributes->merge(['class' => $padding. ' ' .$rounded. ' overflow-hidden ' . $shadow . ' ' . $bgColor])}}>
  {{$slot}}
</div>