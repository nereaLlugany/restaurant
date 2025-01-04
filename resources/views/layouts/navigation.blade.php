<nav x-data="{ open: false }" class="flex justify-between items-center px-6 py-4 bg-blackShader shadow-md">
    <!-- Primary Navigation Menu -->
    <div class="w-full flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center space-x-4">
            <a href="/" class="flex items-center text-primary-gold hover:text-primary-goldShade">
                <x-icons.logo class="w-10 h-10" />
                <span class="text-3xl font-bold pl-10 font-fredoka">{{ __('messages.golden_hearth') }}</span>
            </a>
        </div>

        <!-- Navigation Links -->
        <div class="hidden sm:flex space-x-8 font-fredoka font-bold ml-auto">
            <div class="relative flex items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center text-lg font-bold text-primary-gold hover:text-primary-goldShade focus:outline-none">
                            <div>{{ App::currentLocale() }}</div>
                            <div class="ml-1 flex items-center">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a 1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <div class="bg-blackBackground text-white rounded shadow-lg">
                            @foreach (['ca', 'en', 'es', 'eu', 'fr', 'de', 'it', 'zh', 'ja', 'ru'] as $lang)
                                @if ($lang != App::currentLocale())
                                    <x-dropdown-link :href="url('/lang/' . $lang)"
                                        class="block px-4 py-2 text-primary-gold hover:text-primary-goldShade hover:bg-blackShader">
                                        {{ strtoupper($lang) }}
                                    </x-dropdown-link>
                                @endif
                            @endforeach
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>
            @auth
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('messages.dashboard') }}
                </x-nav-link>
            @else
                <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                    {{ __('messages.home') }}
                </x-nav-link>
            @endauth
            <x-nav-link :href="route('reservations')" :active="request()->routeIs('reservations')">
                {{ __('messages.reservations') }}
            </x-nav-link>
            <x-nav-link :href="route('menus')" :active="request()->routeIs('menus')">
                {{ __('messages.menu') }}
            </x-nav-link>
            <x-nav-link :href="route('about-us')" :active="request()->routeIs('about-us')">
                {{ __('messages.about_us') }}
            </x-nav-link>
        </div>
    </div>
    @auth
        <!-- Settings Dropdown -->
        <div class="hidden sm:flex sm:items-center sm:ms-6">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        <div>{{ Auth::user()->name }}</div>

                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('messages.profile') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('messages.log_out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    @else
        <!-- Login/Sign-Up Links for Guests -->
        <div class="hidden sm:flex sm:items-center sm:ms-6 space-x-6">
            <x-nav-link :href="route('login')">
                {{ __('Log In') }}
            </x-nav-link>
        </div>
    @endauth

    <!-- Hamburger -->
    <div class="-me-2 flex items-center sm:hidden">
        <button @click="open = ! open"
            class="inline-flex items-center justify-start p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden bg-blackShader text-white">
        <div class="flex flex-col space-y-2 px-4 py-4">
            <!-- Language Dropdown -->
            <div class="relative">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center text-lg font-bold text-primary-gold hover:text-primary-goldShade focus:outline-none">
                            <div>{{ App::currentLocale() }}</div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a 1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <div class="bg-blackBackground text-white rounded shadow-lg">
                            @foreach (['ca', 'en', 'es', 'eu', 'fr', 'de', 'it', 'zh', 'ja', 'ru'] as $lang)
                                @if ($lang != App::currentLocale())
                                    <x-dropdown-link :href="url('/lang/' . $lang)"
                                        class="block px-4 py-2 text-primary-gold hover:text-primary-goldShade hover:bg-blackShader">
                                        {{ strtoupper($lang) }}
                                    </x-dropdown-link>
                                @endif
                            @endforeach
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Navigation Links -->
            @auth
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('messages.dashboard') }}
                </x-nav-link>
            @else
                <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                    {{ __('messages.home') }}
                </x-nav-link>
            @endauth
            <x-nav-link :href="route('reservations')" :active="request()->routeIs('reservations')">
                {{ __('messages.reservations') }}
            </x-nav-link>
            <x-nav-link :href="route('menus')" :active="request()->routeIs('menus')">
                {{ __('messages.menu') }}
            </x-nav-link>
            <x-nav-link :href="route('about-us')" :active="request()->routeIs('about-us')">
                {{ __('messages.about_us') }}
            </x-nav-link>

            @auth
                <!-- Responsive Settings Options -->
                <div class="border-t border-gray-600 pt-4 mt-4">
                    <div class="px-4">
                        <div class="font-medium text-base">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
                    </div>
                    <div class="mt-3 space-y-2">
                        <x-responsive-nav-link :href="route('profile.edit')">
                            {{ __('messages.profile') }}
                        </x-responsive-nav-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('messages.log_out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
            @else
                <x-nav-link :href="route('login')">
                    {{ __('messages.login') }}
                </x-nav-link>
            @endauth
        </div>
    </div>


</nav>
