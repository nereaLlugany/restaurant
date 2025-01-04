<x-app-layout>
    <div class="bg-blackBackground text-white min-h-screen flex flex-col font-fredoka">
        <!-- Hero Section -->
        <section class="relative bg-cover bg-center min-h-[90vh] flex justify-center items-center"
            style="background-image: url('{{ asset('images/Reservations_Hero.jpg') }}'); background-size: cover;">
            <div class="absolute inset-0 bg-gradient-to-t from-blackBackground to-transparent opacity-90"></div>
            <div class="z-10 text-center px-6">
                <h1 class="text-5xl md:text-7xl font-extrabold text-primary-goldShade drop-shadow-lg font-fredoka">
                    {{ __('messages.make_reservation') }}
                </h1>
                <p class="mt-4 text-2xl md:text-3xl font-bold text-white font-roboto">
                    {{ __('messages.reserve_your_table') }}
                </p>
            </div>
        </section>

        <!-- Reservation Form Section -->
        <div class="py-16 px-6 max-w-3xl mx-auto">
            <!-- Display error message if guests exceed the table capacity -->
            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 rounded-lg mb-6">
                    <h4 class="text-lg font-bold">The following errors occurred:</h4>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('reserves.store') }}" method="POST"
                class="space-y-6 bg-blackShader p-8 rounded-lg shadow-lg">
                @csrf
                <h2 class="text-4xl font-bold text-primary-gold font-fredoka">
                    {{ __('messages.reservation_details') }}
                </h2>

                <!-- Date Selection -->
                <div>
                    <label for="date" class="block text-lg font-medium text-white font-roboto">
                        {{ __('messages.date') }}
                    </label>
                    <input type="date" id="date" name="date" required
                        class="mt-1 p-3 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-gold focus:ring-primary-gold bg-blackShader text-white">
                </div>

                <!-- Hour Selection -->
                <div>
                    <label for="time" class="block text-lg font-medium text-white font-roboto">
                        {{ __('messages.time') }}
                    </label>
                    <input type="time" id="time" name="time" required
                        class="mt-1 p-3 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-gold focus:ring-primary-gold bg-blackShader text-white">
                </div>

                <!-- Number of Guests -->
                <div>
                    <label for="num_guests" class="block text-lg font-medium text-white font-roboto">
                        {{ __('messages.guests') }}
                    </label>
                    <input type="number" id="num_guests" name="num_guests" required min="1"
                        class="mt-1 p-3 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-gold focus:ring-primary-gold bg-blackShader text-white">
                </div>

                <!-- Table Selection -->
                <div>
                    <label for="taula_id" class="block text-lg font-medium text-white font-roboto">
                        {{ __('messages.select_table') }}
                    </label>
                    <select id="taula_id" name="taula_id" required
                        class="mt-1 p-3 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-gold focus:ring-primary-gold bg-blackShader text-white">
                        <option value="">{{ __('messages.choose_table') }}</option>
                        @foreach ($tables as $table)
                            <option value="{{ $table->id }}">Table #{{ $table->num_taula }} ({{ $table->capacitat }}
                                guests)</option>
                        @endforeach
                    </select>
                </div>

                <!-- Status (hidden for users) -->
                <input type="hidden" name="estat" value="pending">

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full bg-primary-gold text-white py-3 px-6 rounded-md font-bold text-xl font-roboto hover:bg-primary-goldShade focus:outline-none focus:ring-2 focus:ring-primary-gold">
                        {{ __('messages.submit_reservation') }}
                    </button>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <x-footer />
    </div>
</x-app-layout>
