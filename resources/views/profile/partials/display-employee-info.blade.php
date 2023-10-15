<section>
    <header>
        <div class="Employee Details">
            <div class="text-white mb-0">
                <div class="text-lg">
                    <nav x-data="{ open: false }" class="bg-green py-4 px-8 z-10">
                        <h5 class="pt-0">Employee Details</h5>
                </div>
            </div>
                </nav>
            <div class="grid grid-flow-col auto-cols-max">
                <div class="col-lg-6">
                    <div class="mt-1 md:mt-1"> 
                        <div class="px-12 bg-white">
                            <div class="flex flex-col space-y-1">
                            <small class="text-muted d-block pt-4">Employee's Name</small>
                                <dd class="text-gray-900">{{ $user->profileable->first_name}}
                                    {{ $user->profileable->middle_name}}
                                    {{ $user->profileable->last_name}}</dd>  
                            <small class="text-muted d-block pt-4">Sex</small>
                            <dd class="text-gray-900">{{ $user->profileable->sex }}</dd>
                            <small class="text-muted d-block pt-4">Birth Date</small>
                            <dd class="text-gray-900">{{ $user->profileable->birthdate }}</dd>                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mt-1 md:mt-1"> 
                        <div class="px-12 bg-white">
                            <div class="flex flex-col space-y-1">
                                <small class="text-muted d-block pt-4">Address</small>
                                <dd class="text-gray-900">{{ $user->profileable->address }}</dd>
                            <small class="text-muted d-block pt-4">Phone Number</small>
                            <dd class="text-gray-900">{{ $user->profileable->phone }}</dd>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</section>