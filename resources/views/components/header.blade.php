<header class="bg-green py-4 px-8">
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
      <x-dropdown>
        <x-dropdown.dropdown-toggle class="hover:text-gray">
          <i class="fa-regular fa-bell"></i>
        </x-dropdown.dropdown-toggle>

        <x-dropdown.dropdown-menu class="right-0 hidden">
          <x-dropdown.dropdown-item href="#">
            <x-slot name="icon">
              <i class="fa-solid fa-check"></i>
            </x-slot>
            <x-slot name="title">Notification 1</x-slot>
          </x-dropdown.dropdown-item>
          <x-dropdown.dropdown-item href="#">
            <x-slot name="icon">
              <i class="fa-solid fa-check"></i>
            </x-slot>
            <x-slot name="title">Notification 2</x-slot>
          </x-dropdown.dropdown-item>
        </x-dropdown.dropdown-menu>
      </x-dropdown>
      
      <x-dropdown>
        <x-dropdown.dropdown-toggle class="hover:text-gray">
          <i class="fa-regular fa-user"></i>
        </x-dropdown.dropdown-toggle>

        <x-dropdown.dropdown-menu class="right-0 w-44">
          <x-dropdown.dropdown-item href="#">
            <x-slot name="icon">
              <i class="fa-solid fa-user"></i>
            </x-slot>
            <x-slot name="title">My Profile</x-slot>
          </x-dropdown.dropdown-item>
          <x-dropdown.dropdown-item href="#">
            <x-slot name="icon">
              <i class="fa-solid fa-unlock"></i>
            </x-slot>
            <x-slot name="title">Change Password</x-slot>
          </x-dropdown.dropdown-item>
          <x-dropdown.dropdown-item href="#">
            <x-slot name="icon">
              <i class="fa-solid fa-right-from-bracket"></i>
            </x-slot>
            <x-slot name="title">Logout</x-slot>
          </x-dropdown.dropdown-item>
        </x-dropdown.dropdown-menu>
      </x-dropdown>
    </div>
  </div>
</header>