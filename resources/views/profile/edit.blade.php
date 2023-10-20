<x-app-layout>
    <div class="flex flex-col space-y-6">
        <div class="p-4 sm:p-0 bg-white shadow sm:rounded-lg">
                @include('profile.partials.display-user-info')
        </div>

        <div class="flex flex-col space-y-6">
            <div class="p-4 sm:p-0 bg-white shadow sm:rounded-lg">
                    @include('profile.partials.display-employee-info')
            </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
        </div>
    </div>
</x-app-layout>
