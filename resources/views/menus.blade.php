<x-guest-layout>
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
        <div class="px-6 max-w-7xl mx-auto">
            @if (session('success'))
                <div class="bg-green-500 text-white px-4 py-3 rounded shadow-md mt-8">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-500 text-white px-4 py-3 rounded shadow-md mt-8">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        <div class="py-8 px-6 max-w-7xl mx-auto space-y-8 text-xl">
            <!-- Menu Section -->
            <section class="bg-blackShader p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-bold text-primary-gold">{{ __('messages.menu') }}</h3>
                <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 font-baby">

                    @foreach ($menus as $menu)
                        <div
                            class="bg-gray-800 p-6 rounded-lg shadow-lg hover:bg-gray-600 transition-all duration-300 relative flex flex-col items-center text-center">
                            <div class="flex items-center justify-between w-full">
                                <!-- Edit Icon-->
                                @can('administrar')
                                    <a href="{{ route('edit_menu', $menu->id) }}"
                                        class="text-primary-gold hover:text-white">
                                        <x-icons.pencil class="w-5 h-5 text-white" />
                                    </a>
                                @endcan

                                <!-- Title in the Center -->
                                <h4 class="text-3xl font-semibold text-primary-gold flex-grow text-center">
                                    {{ $menu->nom }}
                                </h4>

                                <!-- Delete Icon -->
                                @can('administrar')
                                    <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" class="ml-auto">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-white">
                                            <x-icons.trash class="w-5 h-5 text-white" />
                                        </button>
                                    </form>
                                @endcan
                            </div>

                            <p class="text-gray-300 mt-2">{{ $menu->description }}</p>

                            <p class="font-semibold text-gray-300">{{ __('messages.ingredients') }}:</p>

                            <div class="mt-4 text-left w-full">
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="col-span-1 text-left pl-4 space-y-3"> 
                                        @foreach ($menu->firstHalfIngredients as $ingredient)
                                            <p class="text-gray-400">{{ $ingredient }}</p>
                                        @endforeach
                                    </div>
                            
                                    <div class="col-span-1 text-left ml-auto pr-4 space-y-3"> 
                                        @foreach ($menu->secondHalfIngredients as $ingredient)
                                            <p class="text-gray-400">{{ $ingredient }}</p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <p class="mt-4 text-amber-200 font-semibold">{{ __('messages.price') }}:
                                {{ $menu->currencySymbol }}{{ $menu->convertedPrice }}
                            </p>

                            <!-- Show Reviews Link -->
                            <a href="{{ route('menu.reviews', $menu->id) }}"
                                class="mt-4 font-fredoka text-base text-primary-gold hover:text-white">
                                {{ __('messages.show_reviews') }}
                            </a>
                        </div>
                    @endforeach

                    @can('administrar')
                        <!-- Add Menu Button -->
                        <div
                            class="bg-gray-800 p-6 rounded-lg shadow-lg hover:bg-gray-600 transition-all duration-300 flex items-center justify-center cursor-pointer">
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
</x-guest-layout>
