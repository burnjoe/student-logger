<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'iStudentTrack') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>

        <div class="flex items-center justify-center min-h-screen bg-lightGray">
            <div class="flex flex-col overflow-y-auto px-8 py-5 mb-5">
                <div class="max-w-sm">
                    <div class="px-6">
                        <img class="max-w-full" src="{{asset('img/pnc_header.png')}}" alt="">
                    </div>
                </div>

                <x-card class="mt-8">
                    {{ $slot }}
                </x-card>
            </div>
        </div>

        {{-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div> --}}
    </body>
</html>
