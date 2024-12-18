<section>
    <header>
        <h2 class="text-lg font-medium text-primary-gold">
            {{ __('messages.update_title') }}
        </h2>

        <p class="mt-1 text-sm text-gray-300">
            {{ __('messages.update_description') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('messages.current')" class="text-primary-gold" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full bg-blackShader text-white" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-gray-300" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('messages.new')" class="text-primary-gold" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full bg-blackShader text-white" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-gray-300" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('messages.confirm')" class="text-primary-gold" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full bg-blackShader text-white" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-gray-300" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-primary-gold text-blackShader hover:bg-primary-goldShade">
                {{ __('messages.save') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-300"
                >{{ __('messages.saved') }}</p>
            @endif
        </div>
    </form>
</section>
