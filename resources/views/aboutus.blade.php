<x-guest-layout>
    <div class="bg-blackBackground min-h-screen text-white font-fredoka">
        <!-- Hero Image Section -->
        <section class="relative bg-cover bg-center min-h-[60vh] flex justify-center items-center"
            style="background-image: url('{{ asset('images/About_Us_Hero.jpg') }}'); background-size: cover;">
            <div class="absolute inset-0 bg-gradient-to-t from-blackBackground to-transparent opacity-90"></div>
            <div class="z-10 text-center px-6">
                <h1 class="text-4xl font-extrabold text-primary-goldShade drop-shadow-lg">
                    {{ __('messages.about_us') }}
                </h1>
            </div>
        </section>

        <div class="py-12 px-6 max-w-7xl mx-auto space-y-8">
            <!-- About Us Section -->
            <section class="bg-blackShader p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-bold text-primary-gold">{{ __('messages.about_us') }}</h3>
                <div class="mt-4 text-gray-300">
                    <p class="mb-4">
                        {{ __('messages.about_us_description') }}
                    </p>
                    <p>
                        {{ __('messages.about_us_text') }}
                    </p>
                </div>
            </section>

            <!-- Our Story Section -->
            <section class="bg-blackShader p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-bold text-primary-gold">{{ __('messages.our_story') }}</h3>
                <div class="mt-4 text-gray-300">
                    <p>
                        {{ __('messages.our_story_text') }}
                    </p>
                    <p class="mt-4">
                        {{ __('messages.our_story_additional') }}
                    </p>
                </div>
            </section>

            <!-- Our Values Section -->
            <section class="bg-blackShader p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-bold text-primary-gold">{{ __('messages.our_values') }}</h3>
                <div class="mt-4 text-gray-300">
                    <ul class="list-disc pl-6">
                        <li>{{ __('messages.commitment_quality') }}</li>
                        <li>{{ __('messages.excellence_service') }}</li>
                        <li>{{ __('messages.welcoming_atmosphere') }}</li>
                        <li>{{ __('messages.community_engagement') }}</li>
                    </ul>
                </div>
            </section>

            <!-- Our Team & Chefs Section -->
            <section class="bg-blackShader p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-bold text-primary-gold">{{ __('messages.our_team') }}</h3>
                <div class="mt-4 text-gray-300">
                    <p>{{ __('messages.our_team_description') }}</p>
                </div>

                <!-- Team Grid -->
                <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Manager -->
                    <div class="bg-blackShader p-4 rounded-lg shadow-lg text-center">
                        <img src="{{ asset('images/manager.jpg') }}" alt="Manager"
                            class="w-full h-48 object-cover rounded-lg mb-4">
                        <h4 class="text-lg font-semibold text-primary-gold">{{ __('messages.manager_name') }}</h4>
                        <p class="text-gray-400">{{ __('messages.manager_title') }}</p>
                        <p class="text-gray-300 mt-2">{{ __('messages.manager_description') }}</p>
                    </div>

                    <!-- Chef 1 -->
                    <div class="bg-blackShader p-4 rounded-lg shadow-lg text-center">
                        <img src="{{ asset('images/chef1.jpg') }}" alt="Chef 1"
                            class="w-full h-48 object-cover rounded-lg mb-4">
                        <h4 class="text-lg font-semibold text-primary-gold">{{ __('messages.chef1_name') }}</h4>
                        <p class="text-gray-400">{{ __('messages.chef1_title') }}</p>
                        <p class="text-gray-300 mt-2">{{ __('messages.chef1_description') }}</p>
                    </div>

                    <!-- Chef 2 -->
                    <div class="bg-blackShader p-4 rounded-lg shadow-lg text-center">
                        <img src="{{ asset('images/chef2.jpg') }}" alt="Chef 2"
                            class="w-full h-48 object-cover rounded-lg mb-4">
                        <h4 class="text-lg font-semibold text-primary-gold">{{ __('messages.chef2_name') }}</h4>
                        <p class="text-gray-400">{{ __('messages.chef2_title') }}</p>
                        <p class="text-gray-300 mt-2">{{ __('messages.chef2_description') }}</p>
                    </div>

                    <!-- Chef 3 -->
                    <div class="bg-blackShader p-4 rounded-lg shadow-lg text-center">
                        <img src="{{ asset('images/chef3.jpg') }}" alt="Chef 3"
                            class="w-full h-48 object-cover rounded-lg mb-4">
                        <h4 class="text-lg font-semibold text-primary-gold">{{ __('messages.chef3_name') }}</h4>
                        <p class="text-gray-400">{{ __('messages.chef3_title') }}</p>
                        <p class="text-gray-300 mt-2">{{ __('messages.chef3_description') }}</p>
                    </div>

                    <!-- Chef 4 -->
                    <div class="bg-blackShader p-4 rounded-lg shadow-lg text-center">
                        <img src="{{ asset('images/chef4.jpg') }}" alt="Chef 4"
                            class="w-full h-48 object-cover rounded-lg mb-4">
                        <h4 class="text-lg font-semibold text-primary-gold">{{ __('messages.chef4_name') }}</h4>
                        <p class="text-gray-400">{{ __('messages.chef4_title') }}</p>
                        <p class="text-gray-300 mt-2">{{ __('messages.chef4_description') }}</p>
                    </div>

                    <!-- Head Waitress -->
                    <div class="bg-blackShader p-4 rounded-lg shadow-lg text-center">
                        <img src="{{ asset('images/head_waitress.jpg') }}" alt="Head Waitress"
                            class="w-full h-48 object-cover rounded-lg mb-4">
                        <h4 class="text-lg font-semibold text-primary-gold">{{ __('messages.head_waitress_name') }}
                        </h4>
                        <p class="text-gray-400">{{ __('messages.head_waitress_title') }}</p>
                        <p class="text-gray-300 mt-2">{{ __('messages.head_waitress_description') }}</p>
                    </div>
                </div>
            </section>

            <!-- Contact Us Section -->
            <section id="contact-us" class="bg-blackShader p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-bold text-primary-gold">{{ __('messages.contact') }}</h3>
                <div class="mt-4 text-gray-300">
                    <p>{{ __('messages.contact_description') }}</p>
            
                    <!-- Phone number -->
                    <p class="mt-4">
                        <strong>{{ __('messages.phone') }}:</strong> <a href="tel:+123456789" class="text-primary-gold hover:text-primary-goldShade">123-456-789</a>
                    </p>
            
                    <!-- Email -->
                    <p class="mt-2">
                        <strong>{{ __('messages.email') }}:</strong> <a href="mailto:contact@goldenhearth.com" class="text-primary-gold hover:text-primary-goldShade">contact@goldenhearth.com</a>
                    </p>
            
                    <!-- Address -->
                    <p class="mt-4">
                        <strong>{{ __('messages.address') }}:</strong> <a href="https://www.google.es/maps/place/Isla+de+Pascua/@-27.1253299,-109.6506563,11z/data=!3m1!4b1!4m6!3m5!1s0x9947f017a8d4ae2b:0xbbe5b3edc02a2db6!8m2!3d-27.112723!4d-109.3496865!16zL20vMGRfeno?entry=ttu&g_ep=EgoyMDI0MTIwOS4wIKXMDSoASAFQAw%3D%3D" target="_blank" class="text-primary-gold hover:text-primary-goldShade">123 Golden Street, Golden City, GC 12345</a>
                    </p>
                </div>
            </section>
            
        </div>
    </div>
    <x-footer />
</x-guest-layout>
