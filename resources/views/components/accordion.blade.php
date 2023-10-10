<div x-data="() => ({
        selected: null
    })" 
    x-on:close-accordion.window="selected = null"
    {{ $attributes->merge(['class' => 'w-full mx-auto space-y-4']) }}>
    
    {{ $slot }}
</div>