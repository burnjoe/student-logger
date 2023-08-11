<header class="bg-green py-4 px-8 z-10">
  <div class="flex items-center justify-between space-x-8">
    <div class="text-white space-x-8">
      <button id="sidebar-btn" class="transition-all focus:outline-none hover:text-gray">
        <i class="fa-solid fa-bars"></i>
      </button>
      <span class="space-x-3">
        <i class="fa-solid fa-chart-simple"></i><span class="font-bold text-lg">Dashboard</span>
      </span>
    </div>

    <div class="flex text-white space-x-8">
      {{-- <button id="notification-btn" class="transition-all focus:outline-none hover:text-gray">
        <i class="fa-regular fa-bell"></i>
      </button> --}}

      <x-dropdown>
        <x-dropdown-toggle class="hover:text-gray">
          <i class="fa-regular fa-bell"></i>
        </x-dropdown-toggle>

        <x-dropdown-menu class="right-0">
          <x-dropdown-item>
            <x-slot name="link">#</x-slot>
            <x-slot name="icon">
              <i class="fa-solid fa-user"></i>
            </x-slot>
            <x-slot name="title">My Profile</x-slot>
          </x-dropdown-item>
        </x-dropdown-menu>
      </x-dropdown>
      
      <x-dropdown>
        <x-dropdown-toggle class="hover:text-gray">
          <i class="fa-regular fa-user"></i>
        </x-dropdown-toggle>

        <x-dropdown-menu class="right-0">
          <x-dropdown-item>
            <x-slot name="link">#</x-slot>
            <x-slot name="icon">
              <i class="fa-solid fa-user"></i>
            </x-slot>
            <x-slot name="title">My Profile</x-slot>
          </x-dropdown-item>
          <x-dropdown-item>
            <x-slot name="link">#</x-slot>
            <x-slot name="icon">
              <i class="fa-solid fa-right-from-bracket"></i>
            </x-slot>
            <x-slot name="title">Log Out</x-slot>
          </x-dropdown-item>
        </x-dropdown-menu>
      </x-dropdown>
      
    </div>
  </div>
</header>

{{-- Use Laravel Mix for assets --}}
@push('scripts')
  <script src="{{ asset('js/dropdown.js') }}"></script>
@endpush