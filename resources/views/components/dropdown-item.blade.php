@props([
  'fontSize' => 'text-sm'
])

<a {{ $attributes->merge(['class' => 'flex block w-full px-4 py-2 text-left ' .$fontSize. ' rounded-lg transition-all hover:bg-lightGray']) }}>
  @if(isset($icon))
    <span class="w-6">
      {{ $icon }}
    </span>
  @endif
  
  <span>
    {{ $slot }}
  </span>
</a>
