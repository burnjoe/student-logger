<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'iStudentTrack') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css'])

    @livewireStyles
</head>

<body>
    <div x-data="{ sidebarOpen: true }" class="flex h-screen overflow-x-auto overflow-y-hidden">
        {{-- Side Nav --}}
        @include('layouts.sidebar')

        <div class="flex-1 flex flex-col p-0">
            {{-- Top Nav --}}
            @include('layouts.navigation')

            <div class="flex flex-col h-full overflow-y-auto">
                {{-- Page Content --}}
                <main class="flex-1 bg-lightGray p-8">
                    {{ $slot }}
                </main>

                {{-- Footer --}}
                @include('layouts.footer')
            </div>
        </div>
    </div>


    {{-- Toastr --}}
    @push('scripts')
    @vite(['resources/js/app.js'])
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        toastr.options = {
            "showDuration": "300",
            "hideDuration": "800",
            "closeButton": true,
            "positionClass": "toast-bottom-right",
        }
        
        window.addEventListener('info', event => {
            toastr.info(event.detail[0].message);
        });

        window.addEventListener('success', event => {
            toastr.success(event.detail[0].message);
        });

        window.addEventListener('warning', event => {
            toastr.warning(event.detail[0].message);
        });

        window.addEventListener('error', event => {
            toastr.error(event.detail[0].message);
        });
    </script>
    @endpush

    @livewireScripts

    @stack('scripts')
</body>

</html>