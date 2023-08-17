@props([
    'shadow' => 'shadow-none',
    'bgColor' => 'bg-blue',
])

<x-card {{ $attributes->merge(['class' => 'absolute top-8 right-8']) }} shadow="{{ $shadow }}">
  <x-card.card-section  bgColor="{{ $bgColor }}">
    <span class="text-xs text-white"> {{ $slot }} </span>
  </x-card.card-section>
</x-card>