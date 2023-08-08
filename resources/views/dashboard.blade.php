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
    <aside id="sidebar" class="flex-col bg-white drop-shadow-lg p-0 p-4 px-8 overflow-x-hidden overflow-y-auto transition-all w-0 lg:w-64">
      <div class="flex items-center space-x-4">
        <img class="h-8 w-8" src="{{asset('img/pnc_logo.png')}}" alt="">
        <span>iStudentTrack</span>
      </div>
      
    </aside>

    <div class="flex-1 flex flex-col p-0">
      <!-- Header -->
      <header class="bg-green py-4 px-8 z-10">
        <div class="flex items-center justify-between space-x-8">
          <div class="text-white space-x-8">
            <button id="sidebar-btn" class="transition-all focus:outline-none hover:text-gray">
              <i class="fa-solid fa-bars"></i>
            </button>
            <span class="space-x-3">
              <i class="fa-solid fa-chart-simple"></i><span class="font-bold text-lg">Dashboard</span>
            </span>
          </div>

          <div class="text-white space-x-8">
            <button class="transition-all focus:outline-none hover:text-gray">
              <i class="fa-regular fa-bell"></i>
            </button>
            <button class="transition-all focus:outline-none hover:text-gray">
              <i class="fa-regular fa-user"></i>
            </button>
          </div>
        </div>
      </header>
      
      <!-- Main -->
      <main class="flex-1 bg-lightGray p-8 overflow-y-auto">
        
        <!-- Variable content here -->
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam explicabo voluptates tempora, adipisci ratione expedita quo id optio. Voluptate enim reiciendis, tenetur incidunt voluptates reprehenderit distinctio omnis ea magnam error? <br>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam explicabo voluptates tempora, adipisci ratione expedita quo id optio. Voluptate enim reiciendis, tenetur incidunt voluptates reprehenderit distinctio omnis ea magnam error? <br>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam explicabo voluptates tempora, adipisci ratione expedita quo id optio. Voluptate enim reiciendis, tenetur incidunt voluptates reprehenderit distinctio omnis ea magnam error? <br>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam explicabo voluptates tempora, adipisci ratione expedita quo id optio. Voluptate enim reiciendis, tenetur incidunt voluptates reprehenderit distinctio omnis ea magnam error? <br>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam explicabo voluptates tempora, adipisci ratione expedita quo id optio. Voluptate enim reiciendis, tenetur incidunt voluptates reprehenderit distinctio omnis ea magnam error? <br>
        
        <footer class="flex justify-center pt-24">
          Here is footer
        </footer>
      </main>

    </div>
  </div>

  {{-- make it external script --}}
  <script>
    document.getElementById('sidebar-btn').addEventListener('click', () => {
      const sidebar = document.getElementById('sidebar');

      sidebar.classList.toggle('lg:w-64');
      sidebar.classList.toggle('p-4');
      sidebar.classList.toggle('px-8');
    });
  </script>
</body>
</html>