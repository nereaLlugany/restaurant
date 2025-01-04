<x-guest-layout>
    <div class="bg-blackBackground min-h-screen text-white font-fredoka">
        <!-- Hero Section -->
        <section class="relative bg-cover bg-center min-h-[60vh] flex justify-center items-center"
            style="background-image: url('{{ asset('images/Menu_Image.jpg') }}'); background-size: cover;">
            <div class="absolute inset-0 bg-gradient-to-t from-blackBackground to-transparent opacity-90"></div>
            <div class="z-10 text-center px-6">
                <h1 class="text-4xl font-extrabold text-primary-goldShade drop-shadow-lg">
                    {{ __('messages.reviews_for') }}: {{ $menu->nom }}
                </h1>
            </div>
        </section>

        <div class="py-12 px-6 max-w-7xl mx-auto space-y-8">
            <!-- Reviews Section -->
            <section class="bg-blackShader p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-bold text-primary-gold">{{ __('messages.reviews') }}</h3>
                <div class="mt-4 space-y-4">
                    @foreach ($menu->resenyes as $review)
                        <div class="p-4 bg-gray-700 rounded-lg shadow-md">
                            <div class="flex justify-between items-center">
                                <!-- Display User Name, Fallback to 'Anonymous' -->
                                <span class="font-semibold text-gray-300">
                                    {{ $review->usuari ? $review->usuari->name : __('messages.anonymous') }}
                                </span>
                                <!-- Display Rating -->
                                <span class="text-yellow-400">{{ $review->puntuacio }} / 5</span>
                            </div>

                            <!-- Display Comment in Current Locale -->
                            @if ($review->$descriptionField)
                                <p class="text-gray-400 mt-2">
                                    {{ $review->$descriptionField }}
                                </p>
                            @else
                                <p class="text-gray-400 mt-2">
                                    {{ __('messages.no_comment') }}  <!-- Fallback message in case there's no comment -->
                                </p>
                            @endif

                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>

    <x-footer />
</x-guest-layout>
