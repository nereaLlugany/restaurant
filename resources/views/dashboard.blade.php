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
                            <td class="py-2">{{  $comanda->menus ? $comanda->menus->nom : 'N/A'}}</td> 
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
                            <td class="py-2">{{ $comanda->preu_total }}€</td>
                            <td class="py-2">{{ $comanda->estat }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>
    <x-footer />
</x-app-layout>
