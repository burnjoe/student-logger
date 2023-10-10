<aside :class="{'xs:w-0 lg:w-16': !sidebarOpen}" class="absolute w-60 flex-col flex-none bg-white h-full drop-shadow-lg overflow-x-hidden overflow-y-auto transition-all z-20 lg:relative">
    <div :class="{'pb-8': !sidebarOpen}" class="sticky top-0 bg-white pt-1 pb-12 z-10">
        <div x-show="sidebarOpen" class="flex flex-row justify-between">
            <div class="mt-5 mx-6 w-40">
                <a href="{{ route('root') }}"><img class="w-full" src="{{asset('img/ist_logo.png')}}" alt=""></a>
            </div>
        
            {{-- close button --}}
            <button x-cloak x-show="sidebarOpen" @click="sidebarOpen = !sidebarOpen" class="mt-4 mx-6 lg:hidden">
                <i class="fa-solid fa-x"></i>
            </button>
        </div>

        <div x-cloak x-show="!sidebarOpen" class="mt-2 mx-3 w-40">
            <a href="{{ route('root') }}"><img class="h-10 w-10" src="{{asset('img/pnc_logo.png')}}" alt=""></a>
        </div>
    </div>  

    <div x-show="sidebarOpen"
        x-init="setTimeout(() => sidebarOpen = true, 5000)"
        class="bg-darkGray px-6 py-3 text-white flex flex-col space-y-2">
        <span>
            <x-badge>{{ ucwords(auth()->user()->getRoleNames()->first()) }}</x-badge>
        </span>
        <span class="text-sm">{{ auth()->user()->profileable->first_name. ' ' .(auth()->user()->profileable->middle_name ? auth()->user()->profileable->middle_name[0]. '. ' : ' ') .auth()->user()->profileable->last_name }}</span>
    </div>

    <nav class="flex flex-col mx-2 my-2 text-darkGray">
        <a href="{{ route('dashboard') }}" class="rounded-lg transition-all hover:bg-lightGray" title="Dashboard">
            <div class="py-3 px-4 w-full flex space-x-4">
                <span>
                    <i class="w-4 fa-solid fa-chart-simple"></i>
                </span>
                <span x-show="sidebarOpen" class="w-full flex items-center">
                    <span class="text-sm">Dashboard</span>
                </span>
            </div>
        </a>
        @can('view students')
            <x-accordion @click="sidebarOpen = sidebarOpen == false ? true : sidebarOpen">
                <x-accordion-item headerClasses="hover:bg-lightGray" contentClasses="bg-lightGray" :showIndicator="true">
                    @slot('header')
                        <div class="w-full flex space-x-4" title="Students">
                            <span>
                                <i class="w-4 fa-solid fa-user-graduate"></i>
                            </span>
                            <div class="w-full flex justify-between items-center">
                                <span x-show="sidebarOpen">
                                    <span class="text-sm">Students</span>
                                </span>
                            </div>
                        </div>
                    @endslot
                    @slot('content')
                        <a href="{{ route('students') }}" title="Student Information">
                            <div class="w-full transition-all ps-12 pe-4 py-3 hover:bg-gray">
                                <span x-show="sidebarOpen" class="w-full flex items-center">
                                    <span class="text-sm">Information</span>
                                </span>
                            </div>
                        </a>
                        <a href="#" title="RFID">
                            <div class="w-full rounded-b-lg transition-all ps-12 pe-4 py-3 hover:bg-gray">
                                <span x-show="sidebarOpen" class="w-full flex items-center">
                                    <span class="text-sm">RFID</span>
                                </span>
                            </div>
                        </a>
                    @endslot
                </x-accordion-item>
            </x-accordion>
        @endcan
        <a href="#" class="rounded-lg transition-all hover:bg-lightGray" title="Attendance">
            <div class="py-3 px-4 w-full flex space-x-4">
                <span>
                    <i class="w-4 fa-solid fa-clock fa-sm"></i>
                </span>
                <span x-show="sidebarOpen" class="w-full flex items-center">
                    <span class="text-sm">Attendance</span>
                </span>
            </div>
        </a>
        @can('view accounts')
            <a href="#" class="rounded-lg transition-all hover:bg-lightGray" title="Accounts">
                <div class="py-3 px-4 w-full flex space-x-4">
                    <span>
                        <i class="w-4 fa-solid fa-user-large fa-sm"></i>
                    </span>
                    <span x-show="sidebarOpen" class="w-full flex items-center">
                        <span class="text-sm">Accounts</span>
                    </span>
                </div>
            </a>
        @endcan
        @can('view audit log')
            <a href="{{ route('audit-log') }}" class="rounded-lg transition-all hover:bg-lightGray" title="Audit Log">
                <div class="py-3 px-4 w-full flex space-x-4">
                    <span>
                        <i class="w-4 fa-solid fa-clipboard-list"></i>
                    </span>
                    <span x-show="sidebarOpen" class="w-full flex items-center">
                        <span class="text-sm">Audit Log</span>
                    </span>
                </div>
            </a>
        @endcan
        <a href="#" class="rounded-lg transition-all hover:bg-lightGray" title="Reports">
            <div class="py-3 px-4 w-full flex space-x-4">
                <span>
                    <i class="w-4 fa-solid fa-chart-line"></i>
                </span>
                <span x-show="sidebarOpen" class="w-full flex items-center">
                    <span class="text-sm">Reports</span>
                </span>
            </div>
        </a>
        @can('view archive')
            <x-accordion @click="sidebarOpen = sidebarOpen == false ? true : sidebarOpen">
                <x-accordion-item headerClasses="hover:bg-lightGray" contentClasses="bg-lightGray" :showIndicator="true">
                    @slot('header')
                        <div class="w-full flex space-x-4" title="Archive">
                            <span>
                                <i class="w-4 fa-solid fa-box-archive"></i>
                            </span>
                            <div class="w-full flex justify-between items-center">
                                <span x-show="sidebarOpen">
                                    <span class="text-sm">Archive</span>
                                </span>
                            </div>
                        </div>
                    @endslot
                    @slot('content')
                        <a href="{{ route('archive-students') }}" title="Archived Students">
                            <div class="w-full transition-all ps-12 pe-4 py-3 hover:bg-gray">
                                <span x-show="sidebarOpen" class="w-full flex items-center">
                                    <span class="text-sm">Archived Students</span>
                                </span>
                            </div>
                        </a>
                        <a href="#" title="Archived Accounts">
                            <div class="w-full rounded-b-lg transition-all ps-12 pe-4 py-3 hover:bg-gray">
                                <span x-show="sidebarOpen" class="w-full flex items-center">
                                    <span class="text-sm">Archived Accounts</span>
                                </span>
                            </div>
                        </a>
                    @endslot
                </x-accordion-item>
            </x-accordion>
        @endcan

        <hr class="mx-4 my-2 text-gray">

        <a href="#" class="rounded-lg transition-all hover:bg-lightGray" title="Attendance Logger">
            <div class="py-3 px-4 w-full flex space-x-4">
                <span>
                    <i class="w-4 fa-solid fa-id-badge"></i>
                </span>
                <span x-show="sidebarOpen" class="w-full flex items-center">
                    <span class="text-sm">Attendance Logger</span>
                </span>
            </div>
        </a>
        {{-- <a href="#" class="rounded-lg transition-all hover:bg-lightGray">
            <div class="py-3 px-4 w-full flex space-x-2">
                <span class="w-6">
                    <i class="fa-solid fa-hard-drive fa-sm"></i>
                </span>
                <span x-show="sidebarOpen" class="flex items-center">
                    <span class="text-sm">Backup</span>
                </span>
            </div>
        </a> --}}
    </nav>
</aside>