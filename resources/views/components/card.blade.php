@props([
    'shadow' => 'shadow-sm',
    'bgColor' => 'bg-white',
    'rounded' => 'rounded-md',
    'padding' => 'px-6 py-4',
])

<div {{$attributes->merge(['class' => $padding. ' ' .$rounded. ' overflow-hidden ' . $shadow . ' ' . $bgColor])}}>
  {{$slot}}
</div>