<x-guest-layout>
    <!-- Main Container -->
    <div class="bg-blackBackground text-white min-h-screen flex flex-col font-fredoka">
        
        <!-- Hero Section -->
        <section class="relative bg-cover bg-center min-h-[90vh] flex justify-center items-center"
            style="background-image: url('{{ asset('images/Hero_Image.jpg') }}'); background-size: cover;">
            <div class="absolute inset-0 bg-gradient-to-t from-blackBackground to-transparent opacity-90"></div>
            <div class="z-10 text-center px-6">
                <h1 class="text-5xl md:text-7xl font-extrabold text-primary-goldShade drop-shadow-lg">{{ __('messages.edit_menu') }}</h1>
                <p class="mt-4 text-2xl md:text-3xl font-bold text-white">{{ __('messages.hero_subtitle') }}</p>
            </div>
        </section>

        <!-- Menu Editing Section -->
        <section class="bg-blackShader py-16 text-center">
            <div class="max-w-7xl mx-auto space-y-8">
                <!-- Form Title -->
                <h2 class="text-4xl font-bold text-primary-gold">{{ __('messages.edit_menu') }}</h2>

                <!-- Menu Editing Form -->
                <form action="{{ route('menus.update', $menu->id) }}" method="POST" class="space-y-8">
                    @csrf
                    @method('PUT')

                    <!-- Menu Name -->
                    <div>
                        <label for="nom" class="block text-gray-300">{{ __('messages.menu_name') }}</label>
                        <input type="text" name="nom" id="nom" class="input p-4 rounded-lg bg-gray-800 text-white border-2 border-transparent focus:outline-none focus:ring-2 focus:ring-primary-gold transition"
                            value="{{ old('nom', $menu->nom) }}" required>
                    </div>

                    <!-- Menu Price -->
                    <div class="mt-4">
                        <label for="preu_total" class="block text-gray-300">{{ __('messages.menu_price') }}</label>
                        <input type="number" name="preu_total" id="preu_total" class="input p-4 rounded-lg bg-gray-800 text-white border-2 border-transparent focus:outline-none focus:ring-2 focus:ring-primary-gold transition"
                            step="0.01" value="{{ old('preu_total', $menu->preu_total) }}" required>
                    </div>

                    <!-- Ingredients Fields for All Languages -->
                    @foreach (['en', 'fr', 'es', 'it', 'de', 'zh', 'ru', 'ja'] as $lang)
                        <div class="mt-4">
                            <label for="ingredients_{{ $lang }}" class="block text-gray-300">{{ __('messages.ingredients_' . $lang) }}</label>
                            <textarea name="ingredients_{{ $lang }}" id="ingredients_{{ $lang }}" class="input w-3/4 p-3 h-28 rounded-lg bg-gray-800 text-white border-2 border-transparent focus:outline-none focus:ring-2 focus:ring-primary-gold transition">{{ old('ingredients_' . $lang, $menu->{'ingredients_' . $lang}) }}</textarea>
                        </div>
                    @endforeach

                    <!-- Menu Status -->
                    <div class="mt-4">
                        <label for="estat" class="block text-gray-300">{{ __('messages.status') }}</label>
                        <select name="estat" id="estat" class="input p-4 rounded-lg bg-gray-800 text-white border-2 border-transparent focus:outline-none focus:ring-2 focus:ring-primary-gold transition">
                            <option value="1" {{ old('estat', $menu->estat) == 1 ? 'selected' : '' }}>{{ __('messages.available') }}</option>
                            <option value="0" {{ old('estat', $menu->estat) == 0 ? 'selected' : '' }}>{{ __('messages.unavailable') }}</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-4">
                        <button type="submit" class="bg-primary-gold text-white p-4 mt-6 rounded-md font-bold text-xl transition-all duration-300 hover:bg-primary-goldShade focus:outline-none focus:ring-2 focus:ring-primary-gold">
                            {{ __('messages.save_changes') }}
                        </button>
                    </div>
                </form>
            </div>
        </section>

        <!-- Footer -->
        <x-footer />
    </div>
</x-guest-layout>
