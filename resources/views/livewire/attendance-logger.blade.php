<div class="container-none">
    <div class="grid grid-cols-2 h-screen bg-lightGray">
        {{-- Left Column - Prompt Message --}}
        <div class="col-span-1 ps-4 pe-2 py-4 h-full">
            <x-card bgGolor="bg-white" shadow="shadow-lg">
                <div class="max-w-full h-14 mb-4">
                    <img class="w-full h-full object-contain" src="{{ asset('img/pnc_header.png') }}" alt="">
                </div>
                <div class="py-8">
                    <p class="text-2xl font-bold text-center text-veryDarkGray">TAP YOUR ID ON READER</p>
                    <img class="object-contain h-52 w-52 mt-4 mx-auto opacity-50" src="{{ asset('img/reader-icon.jpg') }}" alt="">
                </div>

                <input type="text" x-model="rfid" hidden />
            </x-card>
        </div>


        {{-- Right Column - Information --}}
        <div class="col-span-1 ps-2 pe-4 py-4">
            <x-card bgGolor="bg-white" shadow="shadow-lg">
                <p class="text-xl text-veryDarkGray text-end font-semibold">
                    LIVE STUDENT POPULATION COUNT:
                </p> 
                <p class="text-6xl text-veryDarkGray text-end font-bold">
                    0
                </p>
            </x-card>
            <x-card bgColor="bg-white" shadow="shadow-lg" class="mt-4" padding="px-6 py-12">
                <img class="object-contain h-60 w-60 mx-auto" src="{{ asset('img/user_icon.png') }}" alt="">
                <p class="mt-4 text-3xl font-semibold text-center text-veryDarkGray">FULL NAME</p>
                <p class="mt-2 text-2xl font-semibold text-center text-veryDarkGray">BSCS</p>
                <div class="flex justify-center mt-2">
                    <x-badge class="my-2 text-white bg-green" size="sm" fontWeight="semibold">
                        ENROLLED
                    </x-badge>
                </div>
            </x-card>
        </div>
    </div>
</div>
