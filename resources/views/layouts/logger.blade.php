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

<body x-data="{ rfid: '', timer: null}" x-init="$watch('rfid', value => rfid = value)" @keydown.window="if ($event.key.match(/^[0-9A-Za-z]$/)) {
        rfid += $event.key;
        clearTimeout(timer);
        timer = setTimeout(() => {
            rfid = '';
        }, 50);
    } else if ($event.key.match(/\r|Enter/)) {
        $dispatch('log', {rfid: rfid});
    }">
    {{ $slot }}

    {{-- Back Button --}}
    <x-button btnType="secondary" element="a" :href="route('dashboard')" class="absolute top-8 left-8"
        rounded="rounded-md">
        <i class="fa-solid fa-arrow-left"></i>
    </x-button>

    {{-- Toastr --}}
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
            "positionClass": "toast-bottom-left",
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

    @livewireScripts
</body>

</html>