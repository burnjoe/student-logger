@props([
    'shadow' => 'shadow-xl',
    'bgColor' => 'bg-white',
    'rounded' => 'rounded-lg',
])

<div {{$attributes->merge(['class' => 'max-w-sm px-4 py-3 ' .$rounded. ' overflow-hidden ' . $shadow . ' ' . $bgColor])}}>
  {{$slot}}
</div>