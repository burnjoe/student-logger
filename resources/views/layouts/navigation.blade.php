<nav x-data="{ open: false }" class="bg-green py-4 px-8">
    <!-- Primary Navigation Menu -->
    <div class="flex justify-between space-x-8">
        <div class="text-white space-x-8">
            <button class="transition-all focus:outline-none hover:text-gray">
                <i class="fa-solid fa-bars"></i>
            </button>
            <span class="space-x-3">
                <i class="fa-solid fa-chart-simple"></i><span class="font-bold text-lg">{{ __('Dashboard') }}</span>
            </span>
        </div>
        
        <div class="flex text-white space-x-8">
            <!-- Notification Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" menuWidth="44">
                    <x-slot name="trigger">
                        <button class="transition-all focus:outline-none hover:text-gray">
                            <i class="fa-regular fa-bell"></i>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('root')" fontSize="text-xs">
                            <x-slot name="icon">
                                <i class="fa-solid fa-check"></i>
                            </x-slot>
                            {{__('Notification 1') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('root')" fontSize="text-xs">
                            <x-slot name="icon">
                                <i class="fa-solid fa-check"></i>
                            </x-slot>
                            {{__('Notification 2') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Profile Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" menuWidth="44">
                    <x-slot name="trigger">
                        <button class="transition-all focus:outline-none hover:text-gray">
                            <i class="fa-regular fa-user"></i>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" fontSize="text-xs">
                            <x-slot name="icon">
                                <i class="fa-solid fa-user"></i>
                            </x-slot>
                            {{__('My Profile') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('profile.edit')" fontSize="text-xs">
                            <x-slot name="icon">
                                <i class="fa-solid fa-unlock"></i>
                            </x-slot>
                            {{__('Change Password') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); 
                                    this.closest('form').submit();" fontSize="text-xs">
                                <x-slot name="icon">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                </x-slot>
                                {{ __('Logout') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>

        





        {{-- <div class="flex">
            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
            </div>
        </div> --}}


        <!-- Hamburger -->
        {{-- <div class="-mr-2 flex items-center sm:hidden">
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div> --}}
    </div>

    <!-- Responsive Navigation Menu -->
    {{-- <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div> --}}
</nav>
