<div {{ $attributes->merge(['class' => 'dropdown-menu absolute w-40 px-1.5 py-1.5 mt-2 rounded-md shadow-lg text-darkGray bg-white ring-1 ring-black ring-opacity-5 hidden']) }}>
  {{ $slot }}  
</div>


{{-- 'dropdown-menu absolute origin-top-right px-1.5 py-1.5 mt-3 right-0 w-40 rounded-md shadow-lg text-darkGray bg-white ring-1 ring-black ring-opacity-5' --}}