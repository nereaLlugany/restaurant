<x-guest-layout>
    <!-- Main Container -->
    <div class="bg-blackBackground text-white min-h-screen flex flex-col font-fredoka">
        <!-- Hero Section -->
        <section class="relative bg-cover bg-center min-h-[90vh] flex justify-center items-center" 
            style="background-image: url('{{ asset('images/Hero_Image.jpg') }}'); background-size: cover;">
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
                        <a href="{{route('reservations')}}" class="block mt-4 font-bold text-primary-gold hover:text-primary-goldShade font-roboto">{{ __('messages.reserve_now') }}</a>
                    </div>
                </div>

                <!-- Menu -->
                <div class="relative bg-white text-blackBackground rounded-lg shadow-lg hover:scale-105 transition-transform duration-300">
                    <img src="{{ asset('images/Menu_Image.png') }}" alt="{{ __('messages.menu') }}" class="rounded-t-lg">
                    <div class="p-6">
                        <h3 class="text-xl font-bold font-fredoka">{{ __('messages.menu') }}</h3>
                        <p class="mt-2 font-bold text-gray-700 font-roboto">{{ __('messages.menu_description') }}</p>
                        <a href="{{route('menus')}}" class="block mt-4 font-bold text-primary-gold hover:text-primary-goldShade font-roboto">{{ __('messages.view_menu') }}</a>
                    </div>
                </div>

                <!-- About Us -->
                <div class="relative bg-white text-blackBackground rounded-lg shadow-lg hover:scale-105 transition-transform duration-300">
                    <img src="{{ asset('images/About_Us_Image.png') }}" alt="{{ __('messages.about_us') }}" class="rounded-t-lg">
                    <div class="p-6">
                        <h3 class="text-xl font-bold font-fredoka">{{ __('messages.about_us') }}</h3>
                        <p class="mt-2 font-bold text-gray-700 font-roboto">{{ __('messages.about_us_description') }}</p>
                        <a href="{{route('about-us')}}" class="block mt-4 font-bold text-primary-gold hover:text-primary-goldShade font-roboto">{{ __('messages.read_more') }}</a>
                    </div>
                </div>

                <!-- Contact -->
               <div class="relative bg-white text-blackBackground rounded-lg shadow-lg hover:scale-105 transition-transform duration-300">
                    <img src="{{ asset('images/Contact_Us_Image.png') }}" alt="{{ __('messages.contact') }}" class="rounded-t-lg">
                    <div class="p-6">
                        <h3 class="text-xl font-bold font-fredoka">{{ __('messages.contact') }}</h3>
                        <p class="mt-2 font-bold text-gray-700 font-roboto">{{ __('messages.contact_description') }}</p>
                        <a href="{{ route('about-us') . '#contact-us' }}" class="block mt-4 font-bold text-primary-gold hover:text-primary-goldShade font-roboto">{{ __('messages.get_in_touch') }}</a>
                    </div>
                </div>

            </div>
        </section>

    <!-- Footer -->
    <x-footer />
</x-guest-layout>
