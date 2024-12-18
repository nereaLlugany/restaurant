<x-app-layout>
    <div class="bg-blackBackground min-h-screen text-white font-fredoka">
        <!-- Hero Image Section -->
        <section class="relative bg-cover bg-center min-h-[60vh] flex justify-center items-center"
            style="background-image: url('{{ asset('images/Menu_Image.jpg') }}'); background-size: cover;">
            <div class="absolute inset-0 bg-gradient-to-t from-blackBackground to-transparent opacity-90"></div>
            <div class="z-10 text-center px-6">
                <h1 class="text-4xl font-extrabold text-primary-goldShade drop-shadow-lg">
                    {{ __('messages.menu') }}
                </h1>
            </div>
        </section>

        <div class="py-12 px-6 max-w-7xl mx-auto space-y-8">
            <!-- Menu Section -->
            <section class="bg-blackShader p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-bold text-primary-gold">{{ __('messages.menu') }}</h3>
                <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                    @foreach ($menus as $menu)
                        <div class="bg-gray-800 p-6 rounded-lg shadow-lg hover:bg-gray-600 transition-all duration-300">
                            <h4 class="text-xl font-semibold text-primary-gold">{{ $menu->nom }}</h4>
                            <p class="text-gray-300 mt-2">{{ $menu->description }}</p>

                            <div class="mt-4">
                                <p class="font-semibold text-gray-300">{{ __('messages.ingredients') }}:</p>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 mt-2">
                                    @foreach ($menu->processedIngredients as $ingredient)
                                        <p class="text-gray-400">{{ $ingredient }}</p>
                                    @endforeach
                                </div>
                            </div>
                            

                            <p class="mt-4 text-primary-gold font-semibold">{{ __('messages.price') }}:
                                €{{ $menu->preu_total }}</p>
                            <p class="mt-2 text-gray-300">{{ __('messages.status') }}:
                                @if ($menu->estat)
                                    {{ __('messages.available') }}
                                @else
                                    {{ __('messages.unavailable') }}
                                @endif
                            </p>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>

    <x-footer />
</x-app-layout>
