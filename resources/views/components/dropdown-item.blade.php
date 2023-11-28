@props([
    'fontSize' => 'text-sm',
    'hoverColor' => 'hover:bg-lightGray',
])

<a {{ $attributes->merge(['class' => 'flex block w-full px-4 py-2 rounded-lg text-left ' .$fontSize. ' transition-all '.
    $hoverColor]) }}>
    @if(isset($icon))
    <span class="w-6">
        {{ $icon }}
    </span>
    @endif

    <span>
        {{ $slot }}
    </span>
</a>