@if (isset($leftIcon))
  <span class="absolute inset-y-0 left-2 flex items-center ps-2">
    {{ $leftIcon }}
  </span>
  <input {{ $attributes->merge(['class' => 'ps-10 pe-4 py-1.5 w-full border border-gray rounded-md']) }}>
@elseif (isset($rightIcon))
  <span class="absolute inset-y-0 right-2 flex items-center pe-2">
    {{ $rightIcon }}
  </span>
  <input {{ $attributes->merge(['class' => 'ps-4 pe-10 py-1.5 w-full border border-gray rounded-md']) }}>
@else
  <input {{ $attributes->merge(['class' => 'px-4 py-1.5 w-full border border-gray rounded-md']) }}>
@endif