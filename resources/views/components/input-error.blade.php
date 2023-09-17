@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-xs text-red space-y-1']) }}>
        @foreach (array_unique((array) $messages) as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
