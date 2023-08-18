@props([
    'shadow' => 'shadow-lg',
    'bgColor' => 'bg-white',
    'rounded' => 'rounded-lg'
])

<div {{$attributes->merge(['class' => 'max-w-sm ' .$rounded. ' overflow-hidden ' . $shadow . ' ' . $bgColor])}}>
  {{$slot}}
</div>