@props([
    'value',
    'required' => false
])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-black']) }}>
    {{ $value ?? $slot }} 
    @if($required) 
        <span class="text-sm text-red">*</span>
    @endif
</label>
