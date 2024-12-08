<x-guest-layout>
    <!-- Main Container -->
    <div class="bg-blackBackground text-white min-h-screen flex flex-col font-fredoka">
        
        <nav class="flex justify-between items-center px-6 py-4 bg-blackShader shadow-md">
            <!-- Logo and Name -->
            <div class="flex items-center space-x-4 w-full md:w-auto">
                <a href="/" class="flex items-center text-primary-gold hover:text-primary-goldShade">
                    <x-icons.logo class="w-10 h-10" />
                    <span class="text-3xl font-bold pl-10 font-fredoka">{{ __('messages.golden_hearth') }}</span>
                </a>
            </div>
            <ul class="flex space-x-6 text-lg">
                <li>
                    <div class="relative">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-lg font-medium text-primary-gold hover:text-primary-goldShade focus:outline-none">
                                    <div>{{ App::currentLocale() }}</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a 1 1 0 01-1.414 0l-4-4a 1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <div class="bg-blackBackground text-white rounded shadow-lg">
                                    @foreach (['ca', 'en', 'es', 'fr', 'de', 'it'] as $lang)
                                        @if ($lang != App::currentLocale())
                                            <x-dropdown-link :href="url('/lang/' . $lang)" class="block px-4 py-2 text-primary-gold hover:text-primary-goldShade hover:bg-blackShader">
                                                {{ strtoupper($lang) }}
                                            </x-dropdown-link>
                                        @endif
                                    @endforeach
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </li>
                <li><a href="#" class="hover:text-primary-goldShade">{{ __('messages.reservations') }}</a></li>
                <li><a href="#" class="hover:text-primary-goldShade">{{ __('messages.menu') }}</a></li>
                <li><a href="#" class="hover:text-primary-goldShade">{{ __('messages.about_us') }}</a></li>
                <li><a href="{{ route('login') }}" class="hover:text-primary-goldShade">{{ __('messages.login') }}</a></li>
            </ul>
        </nav>

        <!-- Hero Section -->
        <section class="relative bg-cover bg-center min-h-[90vh] flex justify-center items-center" 
            style="background-image: url('{{ asset('images/Hero_Image.jpg') }}'); background-size: 105%;">
            <div class="absolute inset-0 bg-gradient-to-t from-blackBackground to-transparent opacity-90"></div> 
            <div class="z-10 text-center px-6">
                <h1 class="text-5xl md:text-7xl font-extrabold text-primary-goldShade drop-shadow-lg font-fredoka">{{ __('messages.welcome_message') }}</h1>
                <p class="mt-4 text-2xl md:text-3xl font-bold text-white font-roboto">{{ __('messages.hero_subtitle') }}</p>
            </div>
        </section>

        <!-- Welcome Section -->
        <section class="bg-blackShader py-16 text-center">
            <h2 class="text-4xl font-bold text-primary-gold font-fredoka">{{ __('messages.discover_offerings') }}</h2>
            <p class="mt-4 text-lg font-bold text-gray-300 font-roboto">{{ __('messages.welcome_section') }}</p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mt-12 px-8">
                <!-- Reservations -->
                <div class="relative bg-white text-blackBackground rounded-lg shadow-lg hover:scale-105 transition-transform duration-300">
                    <img src="{{ asset('images/Reservation_Image.jpg') }}" alt="{{ __('messages.reservations') }}" class="rounded-t-lg">
                    <div class="p-6">
                        <h3 class="text-xl font-bold font-fredoka">{{ __('messages.reservations') }}</h3>
                        <p class="mt-2 font-bold text-gray-700 font-roboto">{{ __('messages.reservations_description') }}</p>
                        <a href="#" class="block mt-4 font-bold text-primary-gold hover:text-primary-goldShade font-roboto">{{ __('messages.reserve_now') }}</a>
                    </div>
                </div>

                <!-- Menu -->
                <div class="relative bg-white text-blackBackground rounded-lg shadow-lg hover:scale-105 transition-transform duration-300">
                    <img src="{{ asset('images/Menu_Image.png') }}" alt="{{ __('messages.menu') }}" class="rounded-t-lg">
                    <div class="p-6">
                        <h3 class="text-xl font-bold font-fredoka">{{ __('messages.menu') }}</h3>
                        <p class="mt-2 font-bold text-gray-700 font-roboto">{{ __('messages.menu_description') }}</p>
                        <a href="#" class="block mt-4 font-bold text-primary-gold hover:text-primary-goldShade font-roboto">{{ __('messages.view_menu') }}</a>
                    </div>
                </div>

                <!-- About Us -->
                <div class="relative bg-white text-blackBackground rounded-lg shadow-lg hover:scale-105 transition-transform duration-300">
                    <img src="{{ asset('images/About_Us_Image.png') }}" alt="{{ __('messages.about_us') }}" class="rounded-t-lg">
                    <div class="p-6">
                        <h3 class="text-xl font-bold font-fredoka">{{ __('messages.about_us') }}</h3>
                        <p class="mt-2 font-bold text-gray-700 font-roboto">{{ __('messages.about_us_description') }}</p>
                        <a href="#" class="block mt-4 font-bold text-primary-gold hover:text-primary-goldShade font-roboto">{{ __('messages.read_more') }}</a>
                    </div>
                </div>

                <!-- Contact -->
                <div class="relative bg-white text-blackBackground rounded-lg shadow-lg hover:scale-105 transition-transform duration-300">
                    <img src="{{ asset('images/Contact_Us_Image.png') }}" alt="{{ __('messages.contact') }}" class="rounded-t-lg">
                    <div class="p-6">
                        <h3 class="text-xl font-bold font-fredoka">{{ __('messages.contact') }}</h3>
                        <p class="mt-2 font-bold text-gray-700 font-roboto">{{ __('messages.contact_description') }}</p>
                        <a href="#" class="block mt-4 font-bold text-primary-gold hover:text-primary-goldShade font-roboto">{{ __('messages.get_in_touch') }}</a>
                    </div>
                </div>
            </div>
        </section>

    <!-- Footer -->
    <x-footer />
</x-guest-layout>
