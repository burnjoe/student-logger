<div>
    <x-card>
        <header class="px-5 pt-4">
            <h3 class="text-md font-medium">
                {{ __('Change Password') }}
            </h3>

            <p class="mt-1 text-sm ">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </p>
        </header>

        <form wire:submit.prevent="update" class="mt-6 space-y-4 px-5 pb-4">
            <div>
                <x-input-label for="current_password">
                    <small class="font-normal text-darkGray text-xs">{{ __('Current Password') }}</small>
                </x-input-label>
                <x-input-text id="current_password" wire:model="current_password" type="password"
                    placeholder="{{ __('Current Password') }}" class="mt-1 bg-lightGray md:max-w-md"
                    :messages="$errors->get('current_password')" autocomplete="current_password" />
                <x-input-error :messages="$errors->get('current_password')" />
            </div>

            <div>
                <x-input-label for="password">
                    <small class="font-normal text-darkGray text-xs">{{ __('New Password') }}</small>
                </x-input-label>
                <x-input-text id="password" wire:model="password" type="password" placeholder="{{ __('New Password') }}"
                    class="mt-1 bg-lightGray md:max-w-md" :messages="$errors->get('password')"
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" />
            </div>

            <div>
                <x-input-label for="password_confirmation">
                    <small class="font-normal text-darkGray text-xs">{{ __('Confirm Password') }}</small>
                </x-input-label>
                <x-input-text id="password_confirmation" wire:model="password_confirmation" type="password"
                    placeholder="{{ __('Confirm Password') }}" class="mt-1 bg-lightGray md:max-w-md"
                    autocomplete="password_confirmation" />
            </div>

            <div class="flex items-center gap-4 pt-2">
                <x-button btnType="success">{{ __('Change Password') }}</x-button>
            </div>
        </form>
    </x-card>
</div>