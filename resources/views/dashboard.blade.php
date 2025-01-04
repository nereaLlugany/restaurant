<x-app-layout>
    <div class="bg-blackBackground min-h-screen text-white font-fredoka">
        <section class="relative bg-cover bg-center min-h-[60vh] flex justify-center items-center"
            style="background-image: url('{{ asset('images/Dashboard_Hero_Image.jpg') }}'); background-size: cover;">
            <div class="absolute inset-0 bg-gradient-to-t from-blackBackground to-transparent opacity-90"></div>
            <div class="z-10 text-center px-6">
                <h1 class="text-4xl font-extrabold text-primary-goldShade drop-shadow-lg">
                    {{ __('messages.welcome', ['name' => Auth::user()->name ?? 'Guest']) }}
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
        
        <div class="py-12 px-6 max-w-7xl mx-auto space-y-8">
            <!-- Reservations Section -->
            <section class="bg-blackShader p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-bold text-primary-gold">{{ __('messages.reservations') }}</h3>
                <table class="w-full text-left text-gray-300">
                    <thead>
                        <tr class="border-b border-gray-600">
                            <th class="py-2">{{ __('messages.reservation_id') }}</th>
                            <th class="py-2">{{ __('messages.date') }}</th>
                            <th class="py-2">{{ __('messages.time') }}</th>
                            <th class="py-2">{{ __('messages.guests') }}</th>
                            <th class="py-2">{{ __('messages.status') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reserva)
                            <tr>
                                <td class="py-2">#{{ $reserva->id }}</td>
                                <td class="py-2">{{ \Carbon\Carbon::parse($reserva->data)->format('Y/m/d') }}</td>
                                <td class="py-2">{{ \Carbon\Carbon::parse($reserva->hora)->format('H:i') }}</td>
                                <td class="py-2">{{ $reserva->num_guests ?? 'N/A' }}</td>
                                <td class="py-2">{{ $reserva->estat }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>

            <!-- Orders Section -->
            <section class="bg-blackShader p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-bold text-primary-gold">{{ __('messages.orders') }}</h3>
                <table class="w-full text-left text-gray-300">
                    <thead>
                        <tr class="border-b border-gray-600">
                            <th class="py-2">{{ __('messages.order_id') }}</th>
                            <th class="py-2">{{ __('messages.menu') }}</th>
                            <th class="py-2">{{ __('messages.date') }}</th>
                            <th class="py-2">{{ __('messages.hour') }}</th>
                            <th class="py-2">{{ __('messages.quantity') }}</th>
                            <th class="py-2">{{ __('messages.total') }}</th>
                            <th class="py-2">{{ __('messages.status') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $comanda)
                            <tr>
                                <td class="py-2">#{{ $comanda->id }}</td>
                                <td class="py-2">{{ $comanda->menus ? $comanda->menus->nom : 'N/A' }}</td>
                                <td class="py-2">
                                    @php
                                        $createdAt = new DateTime($comanda->created_at);
                                        echo $createdAt->format('Y/m/d');
                                    @endphp
                                </td>
                                <td class="py-2">
                                    @php
                                        $createdAt = new DateTime($comanda->created_at);
                                        echo $createdAt->format('H:i');
                                    @endphp
                                </td>
                                <td class="py-2">{{ $comanda->quantitat }}</td>

                                @php
                                    // Define conversion rates and symbols
                                    $conversionRates = [
                                        'en' => 1.0, // Euro (default)
                                        'fr' => 1.0,
                                        'it' => 1.0,
                                        'de' => 1.0,
                                        'es' => 1.0,
                                        'zh' => 7.3, // Chinese Yuan
                                        'ja' => 144.8, // Japanese Yen
                                        'ru' => 95.5, // Russian Ruble
                                    ];
                                    $currencySymbols = [
                                        'en' => '€',
                                        'fr' => '€',
                                        'it' => '€',
                                        'de' => '€',
                                        'es' => '€',
                                        'zh' => '¥',
                                        'ja' => '¥',
                                        'ru' => '₽',
                                    ];

                                    // Get current locale
                                    $locale = app()->getLocale();
                                    $rate = $conversionRates[$locale] ?? 1.0;
                                    $symbol = $currencySymbols[$locale] ?? '€';

                                    // Calculate converted price
                                    $convertedPrice = number_format($comanda->preu_total * $rate, 2);
                                @endphp

                                <td class="py-2">{{ $symbol }}{{ $convertedPrice }}</td>
                                <td class="py-2">{{ $comanda->estat }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>

            <!-- Review Section -->
            <section class="bg-blackShader p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-bold text-primary-gold">{{ __('messages.leave_a_review') }}</h3>
                <form action="{{ route('reviews.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Select Menu to Rate -->
                    <div>
                        <label for="menu_id" class="block text-lg font-medium text-white font-roboto">
                            {{ __('messages.select_menu') }} <!-- Add translation for selecting menu -->
                        </label>
                        <select name="menu_id" id="menu_id" required
                            class="mt-1 p-3 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-gold focus:ring-primary-gold bg-blackShader text-white">
                            <option value="">{{ __('messages.choose_menu') }}</option>
                            <!-- Option to select a menu -->
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->nom }}</option>
                                <!-- Display each menu's name -->
                            @endforeach
                        </select>
                    </div>

                    <!-- Review Comments -->
                    <div>
                        <label for="comentari" class="block text-lg font-medium text-white font-roboto">
                            {{ __('messages.leave_a_comment') }}
                        </label>
                        <textarea name="comentari" id="comentari" rows="4" required
                            class="mt-1 p-3 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-gold focus:ring-primary-gold bg-blackShader text-white"></textarea>
                    </div>

                    <!-- Rating -->
                    <div>
                        <label for="rating" class="block text-lg font-medium text-white font-roboto">
                            {{ __('messages.rating') }}
                        </label>
                        <select name="rating" id="rating" required
                            class="mt-1 p-3 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-gold focus:ring-primary-gold bg-blackShader text-white">
                            <option value="1">{{ __('messages.poor') }}</option>
                            <option value="2">{{ __('messages.fair') }}</option>
                            <option value="3">{{ __('messages.good') }}</option>
                            <option value="4">{{ __('messages.very_good') }}</option>
                            <option value="5">{{ __('messages.excellent') }}</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                            class="w-full bg-primary-gold text-white py-3 px-6 rounded-md font-bold text-xl font-roboto hover:bg-primary-goldShade focus:outline-none focus:ring-2 focus:ring-primary-gold">
                            {{ __('messages.submit_review') }}
                        </button>
                    </div>
                </form>
            </section>
        </div>
    </div>
    <x-footer />
</x-app-layout>
