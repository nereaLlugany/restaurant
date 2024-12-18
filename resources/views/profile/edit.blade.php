<x-app-layout>
    <x-slot name="header">
        <div class="z-10 text-center px-6 bg-blackBackground py-4 pt-12">
            <h2 class="font-fredoka text-3xl font-semibold text-primary-gold leading-tight drop-shadow-lg">
                {{ __('messages.profile') }}
            </h2>
        </div>
    </x-slot>

    <div class="bg-blackBackground min-h-screen text-white font-fredoka py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-blackShader rounded-lg shadow-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-blackShader rounded-lg shadow-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-blackShader rounded-lg shadow-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
