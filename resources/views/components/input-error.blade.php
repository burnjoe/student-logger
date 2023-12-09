@props(['messages'])

@if ($messages)
<small {{ $attributes->merge(['class' => 'text-xs text-red']) }}>
    {{ $messages[0] }}
</small>
@endif