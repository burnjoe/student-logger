<nav x-data="{ open: false }" class="bg-green py-4 px-8 z-10 shadow-md">
    <!-- Primary Navigation Menu -->
    <div class="flex justify-between space-x-8">
        <div class="text-white space-x-8">
            <button @click="sidebarToggle(); $dispatch('close-accordion');"
                class="sidebar-button transition-all focus:outline-none hover:text-gray">
                <i class="fa-solid fa-bars"></i>
            </button>
            <span class="space-x-3">
                {{-- Page Titles Shown in Navigation Bar --}}
                @if ($page === 'dashboard')
                <i class="fa-solid fa-chart-simple"></i>
                <span class="font-bold text-lg">{{ __('Dashboard') }}</span>
                @elseif($page === 'students')
                <i class="fa-solid fa-user-graduate"></i>
                <span class="font-bold text-lg">{{ __('Student Information') }}</span>
                @elseif($page === 'rfid')
                <i class="fa-solid fa-user-graduate"></i>
                <span class="font-bold text-lg">{{ __('Student RFID') }}</span>
                @elseif($page === 'attendances')
                <i class="fa-solid fa-clock"></i>
                <span class="font-bold text-lg">{{ __('Attendances') }}</span>
                @elseif($page === 'accounts')
                <i class="fa-solid fa-user-large fa-sm"></i>
                <span class="font-bold text-lg">{{ __('User Accounts') }}</span>
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
            <!-- Profile Dropdown -->
            <div class="flex items-center ml-6">
                <x-dropdown align="right" menuWidth="44">
                    @slot('trigger')
                    <button class="transition-all focus:outline-none hover:text-gray">
                        <i class="fa-regular fa-user"></i>
                    </button>
                    @endslot

                    @slot('content')
                    <x-dropdown-item :href="route('profile')" fontSize="text-xs">
                        @slot('icon')
                        <i class="fa-solid fa-user"></i>
                        @endslot
                        {{ __('My Profile') }}
                    </x-dropdown-item>

                    <x-dropdown-item :href="route('change-password')" fontSize="text-xs">
                        @slot('icon')
                        <i class="fa-solid fa-key"></i>
                        @endslot
                        {{ __('Change Password') }}
                    </x-dropdown-item>

                    <!-- Authentication -->1
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-item :href="route('logout')" onclick="event.preventDefault(); 
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
    </div>
</nav>