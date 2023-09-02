@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-darkGray']) }}>
    {{ $value ?? $slot }}
</label>
