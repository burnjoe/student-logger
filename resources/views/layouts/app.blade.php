<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'iStudentTrack') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="flex h-screen">
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
    </body>
</html>