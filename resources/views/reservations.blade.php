<x-app-layout>
    <div class="bg-blackBackground min-h-screen text-white font-fredoka">
        <section class="relative bg-cover bg-center min-h-[60vh] flex justify-center items-center"
            style="background-image: url('{{ asset('images/Reservations_Hero.jpg') }}'); background-size: cover;">
            <div class="absolute inset-0 bg-gradient-to-t from-blackBackground to-transparent opacity-90"></div>
            <div class="z-10 text-center px-6">
                <h1 class="text-4xl font-extrabold text-primary-goldShade drop-shadow-lg">
                    {{ __('messages.reservations') }}
                </h1>
            </div>
        </section>

        <!-- Reservation Button -->
        <div class="text-center py-8">
            <a href="{{ route('reserves.create') }}"
                class="flex flex-col items-center bg-primary-gold text-white py-6 px-12 rounded-md font-extrabold text-2xl transition-all duration-300 hover:bg-primary-goldShade focus:outline-none focus:ring-2 focus:ring-primary-gold w-80 mx-auto">
                <x-icons.reservation class="w-7 h-7 text-white mb-4" />
                {{ __('messages.make_reservation') }}
            </a>
        </div>

        <div class="py-6 px-6 max-w-7xl mx-auto space-y-8">

            <!-- Display Success Message -->
            @if (session('success'))
                <div class="bg-green-500 text-white px-4 py-3 rounded shadow-md mt-8">
                    {{ session('success') }}
                </div>
            @endif
            <section class="bg-blackShader p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-bold text-primary-gold">{{ __('messages.your_reservations') }}</h3>

                @if ($reserves->isEmpty())
                    <p class="text-gray-300">{{ __('messages.no_reservations') }}</p>
                @else
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
                            @foreach ($reserves as $reservation)
                                <tr>
                                    <td class="py-2">#{{ $reservation->id }}</td>
                                    <td class="py-2">{{ (new DateTime($reservation->hora))->format('Y/m/d') }}</td>
                                    <td class="py-2">{{ (new DateTime($reservation->hora))->format('H:i') }}</td>
                                    <td class="py-2">{{ $reservation->num_guests ?? 'N/A' }}</td>
                                    <td class="py-2">{{ $reservation->estat }}</td>
                                    <td class="py-2">
                                        @php
                                            $reservationDate = new DateTime($reservation->hora); // Reservation datetime
                                            $today = new DateTime(); // Today's datetime
                                            $interval = $today->diff($reservationDate); // Difference between the two
                                        @endphp

                                        <div class="flex items-center space-x-4">
                                            @if ($reservation->estat === 'Pending' || $reservation->estat === 'pending')
                                            <!-- Confirm Button -->
                                                <form action="{{ route('reserves.confirm', $reservation->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="text-white hover:text-green-500 pt-2.5">
                                                        <x-icons.confirmReservation class="w-5 h-5 text-white" />
                                                    </button>
                                                </form>
                                            @endif
                                            
                                            <!-- Edit Button -->
                                            @if ($reservationDate > $today && $interval->days >= 2)
                                                <a href="{{ route('reserves.edit', $reservation->id) }}"
                                                    class="text-white hover:text-primary-goldShade">
                                                    <x-icons.editReservation class="w-5 h-5 text-white" />
                                                </a>
                                            @endif

                                            <!-- Delete Button -->
                                            <form action="{{ route('reserves.destroy', $reservation->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-white hover:text-red-800 pt-2.5">
                                                    <x-icons.cancelReservation class="w-5 h-5 text-white" />
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </section>
        </div>
    </div>
    <x-footer />
</x-app-layout>
