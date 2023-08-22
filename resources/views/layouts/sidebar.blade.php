<aside :class="{'w-0 lg:w-16': !sidebarOpen, 'w-60': sidebarOpen}" class="absolute flex-col bg-white h-full drop-shadow-lg overflow-x-hidden overflow-y-auto transition-all z-10 lg:relative">
    <div :class="{'pb-8': !sidebarOpen}" class="sticky top-0 bg-white pt-1 pb-12 z-10">
        <div x-show="sidebarOpen" class="flex flex-row justify-between">
            <div class="mt-5 mx-6 w-40">
                <a href="{{ route('root') }}"><img class="w-full" src="{{asset('img/ist_logo.png')}}" alt=""></a>
            </div>
        
            {{-- close button --}}
            <button x-show="sidebarOpen" @click="sidebarOpen = !sidebarOpen" class="mt-4 mx-6 lg:hidden">
                <i class="fa-solid fa-x"></i>
            </button>
        </div>

        <div x-cloak x-show="!sidebarOpen" class="mt-2 mx-3 w-40">
            <a href="{{ route('root') }}"><img class="h-10 w-10" src="{{asset('img/pnc_logo.png')}}" alt=""></a>
        </div>
    </div>  

    <div x-show="sidebarOpen" class="bg-darkGray px-6 py-3 text-white flex flex-col space-y-2">
        <span>
            <x-badge>Admin</x-badge>
        </span>
        <span class="text-sm">{{ auth()->user()->name }}</span>
    </div>

    <nav class="flex flex-col mx-2 my-2 text-darkGray">
        <a href="{{ route('root') }}" class="rounded-lg transition-all hover:bg-lightGray">
            <div class="py-3 px-4 w-full flex space-x-2">
                <span class="w-6">
                    <i class="fa-solid fa-chart-simple"></i>
                </span>
                <span x-show="sidebarOpen" class="flex items-center">
                    <span class="text-sm">Dashboard</span>
                </span>
            </div>
        </a>
        <a href="#" class="rounded-lg transition-all hover:bg-lightGray">
            <div class="py-3 px-4 w-full flex space-x-2">
                <span class="w-6">
                    <i class="fa-solid fa-user-graduate"></i>
                </span>
                <span x-show="sidebarOpen" class="flex items-center">
                    <span class="text-sm">Students</span>
                </span>
            </div>
        </a>
        <a href="#" class="rounded-lg transition-all hover:bg-lightGray">
            <div class="py-3 px-4 w-full flex space-x-2">
                <span class="w-6">
                    <i class="fa-solid fa-clock fa-sm"></i>
                </span>
                <span x-show="sidebarOpen" class="flex items-center">
                    <span class="text-sm">Attendance</span>
                </span>
            </div>
        </a>
        <a href="#" class="rounded-lg transition-all hover:bg-lightGray">
            <div class="py-3 px-4 w-full flex space-x-2">
                <span class="w-6">
                    <i class="fa-solid fa-user-large fa-sm"></i>
                </span>
                <span x-show="sidebarOpen" class="flex items-center">
                    <span class="text-sm">Users</span>
                </span>
            </div>
        </a>
        <a href="#" class="rounded-lg transition-all hover:bg-lightGray">
            <div class="py-3 px-4 w-full flex space-x-2">
                <span class="w-6">
                    <i class="fa-solid fa-clipboard-list"></i>
                </span>
                <span x-show="sidebarOpen" class="flex items-center">
                    <span class="text-sm">Audit Log</span>
                </span>
            </div>
        </a>
        <a href="#" class="rounded-lg transition-all hover:bg-lightGray">
            <div class="py-3 px-4 w-full flex space-x-2">
                <span class="w-6">
                    <i class="fa-solid fa-hard-drive fa-sm"></i>
                </span>
                <span x-show="sidebarOpen" class="flex items-center">
                    <span class="text-sm">Backup</span>
                </span>
            </div>
        </a>
    </nav>
</aside>