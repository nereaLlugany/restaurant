<section>
    <header>
        <h2 class="text-lg font-medium text-primary-gold">
            {{ __('messages.profile_information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-300">
            {{ __("messages.update_profile") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('messages.name')" class="text-primary-gold" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full bg-blackShader text-white" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2 text-gray-300" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('messages.email')" class="text-primary-gold" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full bg-blackShader text-white" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2 text-gray-300" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-sm text-gray-300">
                        {{ __('messages.unverified_email') }}

                        <button form="send-verification" class="underline text-sm text-primary-gold hover:text-primary-goldShade rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('messages.resend_verification') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('messages.verification_link_sent') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-primary-gold text-blackShader hover:bg-primary-goldShade">{{ __('message.save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
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
