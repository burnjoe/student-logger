@props([
    'shadow' => 'shadow-lg',
    'bgColor' => 'bg-white',
])

<div {{$attributes->merge(['class' => 'max-w-sm rounded overflow-hidden ' . $shadow . ' ' . $bgColor])}}>
  {{$slot}}
</div>