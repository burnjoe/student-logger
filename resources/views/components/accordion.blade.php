@props([
    'selected' => null,
])

<div x-data="() => ({
        selected: @json($selected)
    })" 
    {{ $attributes->merge(['class' => 'w-full mx-auto space-y-4']) }}>
    
    {{ $slot }}
</div>