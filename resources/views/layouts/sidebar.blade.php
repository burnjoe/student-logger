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
        class="bg-darkGray px-6 py-3 text-white flex flex-col space-y-2">
        <span>
            <x-badge class="text-darkGray bg-lightGray" size="sm" fontWeight="semibold">{{ ucwords(auth()->user()->getRoleNames()->first()) }}</x-badge>
        </span>
        <span class="text-sm">{{ auth()->user()->employee->first_name. ' ' .(auth()->user()->employee->middle_name ? auth()->user()->employee->middle_name[0]. '. ' : ' ') .auth()->user()->employee->last_name }}</span>
    </div>

    <nav class="flex flex-col mx-2 my-2 text-darkGray">
        {{-- Dashboard --}}
        <a href="{{ route('dashboard') }}" class="rounded-lg transition-all hover:bg-lightGray" title="Dashboard" @click="$dispatch('close-accordion')">
            <div class="py-3 px-4 w-full flex space-x-4">
                <span>
                    <i class="w-4 fa-solid fa-chart-simple"></i>
                </span>
                <span x-show="sidebarOpen" class="w-full flex items-center text-sm">
                    Dashboard
                </span>
            </div>
        </a>

        {{-- Students --}}
        @can('manage students')
            <x-accordion @click="sidebarOpen = sidebarOpen == false ? true : sidebarOpen; $dispatch('close-other-accordion', 'archive-accordion');" class="transition-all rounded-lg hover:bg-lightGray" name="students-accordion">
                <x-accordion-item headerClasses="" contentClasses="bg-lightGray" :showIndicator="true">
                    @slot('header')
                        <div class="w-full flex space-x-4" title="Students">
                            <span>
                                <i class="w-4 fa-solid fa-user-graduate"></i>
                            </span>
                            <div class="w-full flex justify-between items-center text-sm" x-show="sidebarOpen">
                                Students
                            </div>
                        </div>
                    @endslot
                    @slot('content')
                        <a href="{{ route('students') }}" title="Student Information" @click="$dispatch('close-accordion')">
                            <div class="w-full transition-all ps-12 pe-4 py-3 hover:bg-gray">
                                <span class="w-full flex items-center text-sm">
                                    Information
                                </span>
                            </div>
                        </a>
                        <a href="{{ route('rfid') }}" title="Student RFID" @click="$dispatch('close-accordion')">
                            <div class="w-full rounded-b-lg transition-all ps-12 pe-4 py-3 hover:bg-gray">
                                <span class="w-full flex items-center text-sm">
                                    RFID
                                </span>
                            </div>
                        </a>
                    @endslot
                </x-accordion-item>
            </x-accordion>
        @endcan

        {{-- Attendances --}}
        <a href="{{ route('attendances') }}" class="rounded-lg transition-all hover:bg-lightGray" title="Attendances" @click="$dispatch('close-accordion')">
            <div class="py-3 px-4 w-full flex space-x-4">
                <span>
                    <i class="w-4 fa-solid fa-clock fa-sm"></i>
                </span>
                <span x-show="sidebarOpen" class="w-full flex items-center text-sm">
                    Attendances
                </span>
            </div>
        </a>

        {{-- Accounts --}}
        @can('view accounts')
            <a href="{{ route('accounts') }}" class="rounded-lg transition-all hover:bg-lightGray" title="Accounts" @click="$dispatch('close-accordion')">
                <div class="py-3 px-4 w-full flex space-x-4">
                    <span>
                        <i class="w-4 fa-solid fa-user-large fa-sm"></i>
                    </span>
                    <span x-show="sidebarOpen" class="w-full flex items-center text-sm">
                        Accounts
                    </span>
                </div>
            </a>
        @endcan

        {{-- Audit Log --}}
        @can('view audit log')
            <a href="{{ route('audit-log') }}" class="rounded-lg transition-all hover:bg-lightGray" title="Audit Log" @click="$dispatch('close-accordion')">
                <div class="py-3 px-4 w-full flex space-x-4">
                    <span>
                        <i class="w-4 fa-solid fa-clipboard-list"></i>
                    </span>
                    <span x-show="sidebarOpen" class="w-full flex items-center text-sm">
                        Audit Log
                    </span>
                </div>
            </a>
        @endcan

        {{-- Reports --}}
        <a href="#" class="rounded-lg transition-all hover:bg-lightGray" title="Reports" @click="$dispatch('close-accordion')">
            <div class="py-3 px-4 w-full flex space-x-4">
                <span>
                    <i class="w-4 fa-solid fa-chart-line"></i>
                </span>
                <span x-show="sidebarOpen" class="w-full flex items-center text-sm">
                    Reports
                </span>
            </div>
        </a>

        {{-- Archive --}}
        @can('view archive')
            <x-accordion @click="sidebarOpen = sidebarOpen == false ? true : sidebarOpen; $dispatch('close-other-accordion', 'students-accordion');" class="transition-all rounded-lg hover:bg-lightGray" name="archive-accordion">
                <x-accordion-item headerClasses="" contentClasses="bg-lightGray" :showIndicator="true">
                    @slot('header')
                        <div class="w-full flex space-x-4" title="Archive">
                            <span>
                                <i class="w-4 fa-solid fa-box-archive"></i>
                            </span>
                            <div class="w-full flex justify-between items-center text-sm" x-show="sidebarOpen">
                                Archive
                            </div>
                        </div>
                    @endslot
                    @slot('content')
                        <a href="{{ route('archive-students') }}" title="Archived Students" @click="$dispatch('close-accordion')">
                            <div class="w-full transition-all ps-12 pe-4 py-3 hover:bg-gray">
                                <span class="w-full flex items-center text-sm">
                                    Archived Students
                                </span>
                            </div>
                        </a>
                        <a href="#" title="Archived Accounts" @click="$dispatch('close-accordion')">
                            <div class="w-full rounded-b-lg transition-all ps-12 pe-4 py-3 hover:bg-gray">
                                <span class="w-full flex items-center text-sm">
                                    Archived Accounts
                                </span>
                            </div>
                        </a>
                    @endslot
                </x-accordion-item>
            </x-accordion>
        @endcan

        <hr class="mx-4 my-2 text-gray">

        {{-- Attendance Logger --}}
        <a href="{{ route('attendance-logger') }}" class="rounded-lg transition-all hover:bg-lightGray" title="Attendance Logger" @click="$dispatch('close-accordion')">
            <div class="py-3 px-4 w-full flex space-x-4">
                <span>
                    <i class="w-4 fa-solid fa-id-badge"></i>
                </span>
                <span x-show="sidebarOpen" class="w-full flex items-center">
                    <span class="text-sm">Attendance Logger</span>
                </span>
            </div>
        </a>
    </nav>
</aside>