<section>
    <header>
        <div class="Profile Details">
            <div class="text-white mb-0">
                <div class="text-lg">
                    <nav x-data="{ open: false }" class="bg-green py-4 px-8 z-10">
                        <h1 class="pt-0">User Information</h1>
                </div>
            </div>
                    </nav>
            <div class="grid grid-flow-col auto-cols-max">
                <div class="col-lg-6">
                    <div class="p-4 sm:p-5 bg-white">
                        <img src="https://pinnacle.pnc.edu.ph/img/user-icon.png" 
                            class="rounded-circle border" width='150' style="border-width:2px">
                        <div class="ml-12"> 
                            <p class="d-block card-subtitle">Profile</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mt-1 md:mt-1"> 
                        <div class="px-12 bg-white">
                            <div class="flex flex-col space-y-1">
                            <small class="text-muted d-block pt-4">Email</small>
                            <dd class="text-gray-900">{{ $user->email }}</dd>   
                            <small class="text-muted d-block pt-4">ID</small>
                            <dd class="text-gray-900">{{ $user->id }}</dd>  
                            <small class="text-muted d-block pt-4">Status</small>
                            <dd class="text-gray-900">{{ $user->status }}</dd>                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</section>
