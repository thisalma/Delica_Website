<x-guest-layout>
    <div class="relative min-h-screen flex items-center justify-center bg-cover bg-center"
         style="background-image: url('{{ asset('images/background.png') }}');">

        <!-- Pink overlay (light) -->
        <div class="absolute inset-0 bg-pink-500/20"></div>

        <!-- Login Card -->
        <div class="relative w-full max-w-md bg-white rounded-2xl shadow-2xl p-8">
            
            <div class="text-center mb-6">
                <h1 class="text-3xl font-bold text-pink-600">
                    Welcome to Delica
                </h1>
                <p class="text-gray-500 mt-2">
                    Please login to continue
                </p>
            </div>

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-label for="email" value="Email" class="text-pink-600 font-semibold"/>
                    <x-input id="email"
                             class="block mt-1 w-full rounded-lg border-pink-300 focus:border-pink-500 focus:ring-pink-500"
                             type="email"
                             name="email"
                             required autofocus />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="Password" class="text-pink-600 font-semibold"/>
                    <x-input id="password"
                             class="block mt-1 w-full rounded-lg border-pink-300 focus:border-pink-500 focus:ring-pink-500"
                             type="password"
                             name="password"
                             required />
                </div>

                <div class="mt-6">
                    <button type="submit"
                            class="w-full py-3 bg-pink-500 hover:bg-pink-600 text-white font-bold rounded-lg">
                        Log In
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
