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
                        <div class="bg-gray-800 p-6 rounded-lg shadow-lg hover:bg-gray-600 transition-all duration-300 relative">
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
                                {{ $menu->currencySymbol }}{{ $menu->convertedPrice }}</p>
                            <p class="mt-2 text-gray-300">{{ __('messages.status') }}:
                                @if ($menu->estat)
                                    {{ __('messages.available') }}
                                @else
                                    {{ __('messages.unavailable') }}
                                @endif
                            </p>

                            @can('administrar')
                                <!-- Edit and Delete Buttons -->
                                <div class="absolute top-2 right-2 flex space-x-2 p-4">
                                    <a href="{{ route('edit_menu', $menu->id) }}" class="text-primary-gold hover:text-white">
                                        <x-icons.pencil class="w-5 h-5 text-white" />
                                    </a>
                                    <form action="{{ route('menus.destroy', $menu->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-white">
                                            <x-icons.trash class="w-5 h-5 text-white" />
                                        </button>
                                    </form>                                    
                                </div>                                
                            @endcan
                        </div>
                    @endforeach

                    @can('administrar')
                        <!-- Add Menu Button -->
                        <div class="bg-gray-800 p-6 rounded-lg shadow-lg hover:bg-gray-600 transition-all duration-300 flex items-center justify-center cursor-pointer">
                            <a href="{{ route('create_menu') }}" class="text-primary-gold flex flex-col items-center">
                                <x-icons.addMenu class="w-5 h-5 text-white" />
                            </a>
                        </div>
                    @endcan
                </div>
            </section>
        </div>
    </div>

    <x-footer />
</x-app-layout>