@props([
    'shadow' => 'shadow-none',
    'bgColor' => 'bg-blue',
    'align' => 'bottom-8 right-8'
])

@php 
  switch ($align) {
    case 'top-left':
      $alignmentClasses = "top-8 left-8";
      break;
    case 'top-right':
      $alignmentClasses = "top-8 right-8";
      break;
    case 'bottom-left':
      $alignmentClasses = "bottom-8 left-8";
      break;
    case 'bottom-right':
    default:
      $alignmentClasses = "bottom-8 right-8";
      break;
  }
@endphp

<x-card {{ $attributes->merge(['class' => 'absolute px-6 py-4 ' .$alignmentClasses ]) }} bgColor="{{ $bgColor }}" shadow="{{ $shadow }}">
  {{ $slot }}
</x-card>