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
        <div class="flex items-center justify-center min-h-screen bg-lightGray">
            <div class="flex flex-col overflow-y-auto px-8 py-5 mb-5">
                <div class="max-w-sm">
                    <div class="px-6">
                        <img class="max-w-full" src="{{asset('img/pnc_header.png')}}" alt="">
                    </div>
                </div>

                <x-card class="mt-8" paddings="px-14 py-45">
                    {{ $slot }}
                </x-card>
            </div>

             <!-- Session Status -->
            @if(session('status'))
                <x-toast :alert="session('alert')">
                    <x-auth-session-status :status="session('status')" />
                </x-toast>
            @endif
            
            @error('email')
                <x-toast alert="warning">
                    {{ $message }}
                </x-toast>
            @enderror
        </div>
    </body>
</html>
