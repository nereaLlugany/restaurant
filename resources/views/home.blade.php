<x-guest-layout>
    <!-- Main Container -->
    <div class="bg-blackBackground text-white min-h-screen flex flex-col">
        
        <nav class="flex justify-between items-center px-6 py-4 bg-blackShader shadow-md">
            <!-- Logo and Name -->
            <div class="flex items-center space-x-4 w-full md:w-auto">
                <a href="/" class="flex items-center text-primary-gold hover:text-primary-goldShade">
                    <x-icons.logo class="w-10 h-10" />
                    <span class="text-3xl font-bold pl-10">{{ __('messages.golden_hearth') }}</span>
                </a>
            </div>
            <ul class="flex space-x-6 text-lg">
                <li>
                    <div class="relative">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-300 focus:outline-none">
                                    <div>{{ App::currentLocale() }}</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a 1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                @foreach (['ca', 'en', 'es', 'fr', 'de', 'it'] as $lang)
                                    @if ($lang != App::currentLocale())
                                        <x-dropdown-link :href="url('/lang/' . $lang)">
                                            {{ strtoupper($lang) }}
                                        </x-dropdown-link>
                                    @endif
                                @endforeach
                            </x-slot>
                        </x-dropdown>
                    </div>
                </li>
                <li><a href="#" class="hover:text-primary-goldShade">{{ __('messages.reservations') }}</a></li>
                <li><a href="#" class="hover:text-primary-goldShade">{{ __('messages.menu') }}</a></li>
                <li><a href="#" class="hover:text-primary-goldShade">{{ __('messages.about_us') }}</a></li>
                <li><a href="#" class="hover:text-primary-goldShade">{{ __('messages.login') }}</a></li>
            </ul>
        </nav>

        <!-- Hero Section -->
        <section class="relative bg-cover bg-center min-h-[90vh] flex justify-center items-center" 
                 style="background-image: url('https://via.placeholder.com/1920x1080?text=Restaurant+Hero+Image');">
            <div class="absolute inset-0 bg-gradient-to-t from-blackBackground to-transparent opacity-90"></div> <!-- Gradient -->
            <div class="z-10 text-center px-6">
                <h1 class="text-5xl md:text-7xl font-extrabold text-primary-goldShade drop-shadow-lg">{{ __('messages.welcome_message') }}</h1>
                <p class="mt-4 text-2xl md:text-3xl font-light text-white">{{ __('messages.hero_subtitle') }}</p>
            </div>
        </section>

        <!-- Welcome Section -->
        <section class="bg-blackShader py-16 text-center">
            <h2 class="text-4xl font-bold text-primary-gold">{{ __('messages.discover_offerings') }}</h2>
            <p class="mt-4 text-lg text-gray-300">{{ __('messages.welcome_section') }}</p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mt-12 px-8">
                <!-- Reservations -->
                <div class="relative bg-white text-blackBackground rounded-lg shadow-lg hover:scale-105 transition-transform duration-300">
                    <img src="https://via.placeholder.com/400x300?text=Reservations" alt="{{ __('messages.reservations') }}" class="rounded-t-lg">
                    <div class="p-6">
                        <h3 class="text-xl font-bold">{{ __('messages.reservations') }}</h3>
                        <p class="mt-2 text-gray-700">{{ __('messages.reservations_description') }}</p>
                        <a href="#" class="block mt-4 text-primary-gold hover:text-primary-goldShade">{{ __('messages.reserve_now') }}</a>
                    </div>
                </div>
                
                <!-- Menu -->
                <div class="relative bg-white text-blackBackground rounded-lg shadow-lg hover:scale-105 transition-transform duration-300">
                    <img src="https://via.placeholder.com/400x300?text=Menu" alt="{{ __('messages.menu') }}" class="rounded-t-lg">
                    <div class="p-6">
                        <h3 class="text-xl font-bold">{{ __('messages.menu') }}</h3>
                        <p class="mt-2 text-gray-700">{{ __('messages.menu_description') }}</p>
                        <a href="#" class="block mt-4 text-primary-gold hover:text-primary-goldShade">{{ __('messages.view_menu') }}</a>
                    </div>
                </div>
                
                <!-- About Us -->
                <div class="relative bg-white text-blackBackground rounded-lg shadow-lg hover:scale-105 transition-transform duration-300">
                    <img src="https://via.placeholder.com/400x300?text=About+Us" alt="{{ __('messages.about_us') }}" class="rounded-t-lg">
                    <div class="p-6">
                        <h3 class="text-xl font-bold">{{ __('messages.about_us') }}</h3>
                        <p class="mt-2 text-gray-700">{{ __('messages.about_us_description') }}</p>
                        <a href="#" class="block mt-4 text-primary-gold hover:text-primary-goldShade">{{ __('messages.read_more') }}</a>
                    </div>
                </div>
                
                <!-- Contact -->
                <div class="relative bg-white text-blackBackground rounded-lg shadow-lg hover:scale-105 transition-transform duration-300">
                    <img src="https://via.placeholder.com/400x300?text=Contact" alt="{{ __('messages.contact') }}" class="rounded-t-lg">
                    <div class="p-6">
                        <h3 class="text-xl font-bold">{{ __('messages.contact') }}</h3>
                        <p class="mt-2 text-gray-700">{{ __('messages.contact_description') }}</p>
                        <a href="#" class="block mt-4 text-primary-gold hover:text-primary-goldShade">{{ __('messages.get_in_touch') }}</a>
                    </div>
                </div>
            </div>
        </section>

    <!-- Footer -->
    <x-footer />
</x-guest-layout>
