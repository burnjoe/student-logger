{{-- @props([
  'href' => '',
]) --}}

<a class="dropdown-item block rounded-lg transition-all hover:bg-lightGray">
  <div class="py-1 px-4 w-full flex space-x-2">
    <span class="w-6">
      {{ $icon }}
    </span>
    <span class="flex items-center">
      <span class="text-xs"> {{ $title }} </span>
    </span>
  </div>
</a>