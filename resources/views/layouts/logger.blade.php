<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'iStudentTrack') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body>
    {{ $slot }}

    {{-- Back Button --}}
    <x-button btnType="secondary" element="a" :href="route('dashboard')" class="absolute top-8 left-8"
    rounded="rounded-md">
        <i class="fa-solid fa-arrow-left"></i>
    </x-button>
</body>
</html>