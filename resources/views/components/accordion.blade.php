@props([
    'name' => '',
])

<div x-data="() => ({
    selected: null
})" x-on:close-accordion.window="selected = null"
   x-on:close-sidebar-accordion.window="selected = null"
   x-on:close-other-accordion.window="if(typeof $event.detail == 'string') {
    $event.detail == '{{ $name }}' ? selected = null : null;
} else if(Array.isArray($event.detail)) {
    $event.detail.includes('{{ $name }}') ? selected = null : null;
}"
   {{ $attributes->merge(['class' => 'w-full mx-auto space-y-2']) }}>

   {{ $slot }}
</div>
