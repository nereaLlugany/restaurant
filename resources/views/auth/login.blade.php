<x-guest-layout>
    <div class="bg-blackBackground text-white min-h-screen flex flex-col font-fredoka">
        <section class="relative bg-cover bg-center min-h-[50vh] flex justify-center items-center" 
            style="background-image: url('{{ asset('images/Hero_Image.jpg') }}'); background-size: cover;">
            <div class="absolute inset-0 bg-gradient-to-t from-blackBackground to-transparent opacity-90"></div> 
            <div class="z-10 text-center px-6 py-12">
                <h1 class="text-4xl md:text-5xl font-extrabold text-primary-goldShade drop-shadow-lg">{{ __('messages.login') }}</h1>
                <p class="mt-4 text-xl md:text-2xl font-bold text-white">{{ __('messages.please_log_in') }}</p>
            </div>
        </section>

        <section class="bg-blackShader py-16 px-6 md:px-16">
            <div class="max-w-md mx-auto bg-white text-blackBackground p-8 rounded-lg shadow-lg">
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <x-input-label for="email" :value="__('messages.email')" />
                        <x-text-input id="email" class="block mt-1 w-full bg-gray-100 text-black border border-gray-300 rounded-lg shadow-sm focus:ring-primary-gold focus:border-primary-gold" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="password" :value="__('messages.password')" />

                        <x-text-input id="password" class="block mt-1 w-full bg-gray-100 text-black border border-gray-300 rounded-lg shadow-sm focus:ring-primary-gold focus:border-primary-gold"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __('messages.remember_me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-primary-gold hover:text-primary-goldShade" href="{{ route('password.request') }}">
                                {{ __('messages.forgot_password') }}
                            </a>
                        @endif

                        <x-primary-button class="ms-3 bg-primary-gold hover:bg-primary-goldShade text-blackBackground py-3 px-6 rounded-md shadow-lg">
                            {{ __('messages.login') }}
                        </x-primary-button>
                    </div>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        {{ __('messages.dont_have_account') }}
                        <a href="{{ route('register') }}" class="text-primary-gold hover:text-primary-goldShade font-bold">
                            {{ __('messages.register_here') }}
                        </a>
                    </p>
                </div>
            </div>
        </section>
    </div>
</x-guest-layout>
