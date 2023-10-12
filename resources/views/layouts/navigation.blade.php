<nav x-data="{ open: false }" class="bg-green py-4 px-8 z-10 shadow-md">
    <!-- Primary Navigation Menu -->
    <div class="flex justify-between space-x-8">
        <div class="text-white space-x-8">
            <button x-cloak 
                @click="sidebarOpen = !sidebarOpen; $dispatch('close-accordion');" 
                class="transition-all focus:outline-none hover:text-gray">
                <i class="fa-solid fa-bars"></i>
            </button>
            <span class="space-x-3">
                {{-- Page Titles Shown in Navigation Bar --}}
                @if($page === 'dashboard')
                    <i class="fa-solid fa-chart-simple"></i>
                    <span class="font-bold text-lg">{{ __('Dashboard') }}</span>
                @elseif($page === 'students')
                    <i class="fa-solid fa-user-graduate"></i>
                    <span class="font-bold text-lg">{{ __('Students') }}</span>
                @elseif($page === 'attendance')
                <i class="fa-solid fa-clock fa-sm"></i>
            </span class="font-bold text-lg">{{ __('Attendance') }}</span>
                @elseif($page === 'accounts')
                    <i class="fa-solid fa-user-large fa-sm"></i>
                    <span class="font-bold text-lg">{{ __('Accounts') }}</span>
                @elseif($page === 'audit_log')
                    <i class="fa-solid fa-clipboard-list"></i>
                    <span class="font-bold text-lg">{{ __('Audit Log') }}</span>
                @elseif($page === 'reports')
                    <i class="fa-solid fa-chart-line"></i>
                    <span class="font-bold text-lg">{{ __('Reports') }}</span>
                @elseif($page === 'archive')
                    <i class="fa-solid fa-box-archive"></i>
                    <span class="font-bold text-lg">{{ __('Archive') }}</span>
                @elseif($page === 'profile')
                    <i class="fa-solid fa-user"></i>
                    <span class="font-bold text-lg">{{ __('Profile') }}</span>
                @elseif($page === 'change_password')
                    <i class="fa-solid fa-key"></i>
                    <span class="font-bold text-lg">{{ __('Change Password') }}</span>
                @endif
            </span>
        </div>
        
        <div class="flex text-white space-x-8">
            {{-- <!-- Notification Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" menuWidth="44">
                    @slot('trigger')
                        <button class="transition-all focus:outline-none hover:text-gray">
                            <i class="fa-regular fa-bell"></i>
                        </button>
                    @endslot
 
                    @slot('content')
                        <x-dropdown-item :href="route('root')" fontSize="text-xs">
                            @slot('icon')
                                <i class="fa-solid fa-check"></i>
                            @endslot
                            {{__('Notification 1') }}
                        </x-dropdown-item>
 
                        <x-dropdown-item :href="route('root')" fontSize="text-xs">
                            @slot('icon')
                                <i class="fa-solid fa-check"></i>
                            @endslot
                            {{__('Notification 2') }}
                        </x-dropdown-item>
                    @endslot
                </x-dropdown>
            </div> --}}
 
            <!-- Profile Dropdown -->
            <div class="flex items-center ml-6">
                <x-dropdown align="right" menuWidth="44">
                    @slot('trigger')
                        <button class="transition-all focus:outline-none hover:text-gray">
                            <i class="fa-regular fa-user"></i>
                        </button>
                    @endslot
 
                    @slot('content')
                        <x-dropdown-item :href="route('profile.edit')" fontSize="text-xs">
                            @slot('icon')
                                <i class="fa-solid fa-user"></i>
                            @endslot
                            {{__('My Profile') }}
                        </x-dropdown-item>
 
                        <x-dropdown-item :href="route('profile.edit')" fontSize="text-xs">
                            @slot('icon')
                                <i class="fa-solid fa-key"></i>
                            @endslot
                            {{__('Change Password') }}
                        </x-dropdown-item>
 
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
 
                            <x-dropdown-item :href="route('logout')"
                                    onclick="event.preventDefault(); 
                                    this.closest('form').submit();" fontSize="text-xs">
                                @slot('icon')
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                @endslot
                                {{ __('Logout') }}
                            </x-dropdown-item>
                        </form>
                    @endslot
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
 