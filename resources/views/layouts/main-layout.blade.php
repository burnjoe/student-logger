<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>iStudentTrack</title>
</head>
<body>

  <div class="flex h-screen">
    <!-- Sidebar -->
    <x-sidebar />

    <div class="flex-1 flex flex-col p-0">
      <!-- Header -->
      <x-header />
      
      <div class="flex flex-col h-full overflow-y-auto">
        <!-- Main -->
        <main class="flex-1 bg-lightGray p-8">
          @yield('content')
        </main>

        {{-- Footer --}}
        <x-footer />
      </div>
    </div>
  </div>

  @stack('scripts')
</body>
</html>