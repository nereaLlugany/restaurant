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

        <div class="py-12 px-6 max-w-7xl mx-auto space-y-8">
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
                                    <td class="py-2">{{ \Carbon\Carbon::parse($reservation->data)->format('Y/m/d') }}
                                    </td>
                                    <td class="py-2">{{ \Carbon\Carbon::parse($reservation->hora)->format('H:i') }}
                                    </td>
                                    <td class="py-2">{{ $reservation->num_guests ?? 'N/A' }}</td>
                                    <td class="py-2">{{ $reservation->estat }}</td>
                                    <td class="py-2">
                                        @php
                                            $reservationDate = new DateTime($reservation->data);
                                            $today = new DateTime();
                                            $interval = $today->diff($reservationDate);
                                        @endphp

                                        <div class="flex items-center space-x-4">
                                            <!-- Edit Button -->
                                            @if ($interval->days >= 2 && $reservationDate > $today)
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
