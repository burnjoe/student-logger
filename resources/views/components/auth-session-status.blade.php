@props(['status'])

@if ($status)
    <span {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600']) }}>
        {{ $status }}
    </span>
@endif
