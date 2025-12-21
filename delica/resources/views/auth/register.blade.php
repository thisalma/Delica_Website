<x-guest-layout>
    <div class="min-h-screen w-screen flex">

        <!-- LEFT IMAGE (FULL IMAGE, NOT CROPPED) -->
        <div class="hidden md:flex w-1/2 items-center justify-center bg-pink-50">
            <img
                src="{{ asset('images/registre.png') }}"
                alt="Register Image"
                class="h-full w-full object-contain"
            >
        </div>

        <!-- RIGHT FORM -->
        <div class="w-full md:w-1/2 flex items-center justify-center bg-white">
            <div class="w-full max-w-md p-8 md:p-12">

                <h2 class="text-3xl font-bold text-pink-600 text-center mb-6">
                    Register to Delica
                </h2>

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-label for="name" value="Name" class="text-pink-600 font-semibold"/>
                        <x-input id="name"
                                 class="block mt-1 w-full rounded-lg border-pink-300 focus:border-pink-500 focus:ring-pink-500"
                                 type="text"
                                 name="name"
                                 required autofocus />
                    </div>

                    <!-- Email -->
                    <div class="mt-4">
                        <x-label for="email" value="Email" class="text-pink-600 font-semibold"/>
                        <x-input id="email"
                                 class="block mt-1 w-full rounded-lg border-pink-300 focus:border-pink-500 focus:ring-pink-500"
                                 type="email"
                                 name="email"
                                 required />
                    </div>

                    <!-- Role -->
                    <div class="mt-4">
                        <x-label for="role" value="Register As" class="text-pink-600 font-semibold"/>
                        <select name="role" id="role"
                                class="block mt-1 w-full rounded-lg border-pink-300 focus:border-pink-500 focus:ring-pink-500">
                            <option value="customer">Customer</option>
                            <option value="provider">Provider</option>
                        </select>
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" value="Password" class="text-pink-600 font-semibold"/>
                        <x-input id="password"
                                 class="block mt-1 w-full rounded-lg border-pink-300 focus:border-pink-500 focus:ring-pink-500"
                                 type="password"
                                 name="password"
                                 required />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-label for="password_confirmation" value="Confirm Password" class="text-pink-600 font-semibold"/>
                        <x-input id="password_confirmation"
                                 class="block mt-1 w-full rounded-lg border-pink-300 focus:border-pink-500 focus:ring-pink-500"
                                 type="password"
                                 name="password_confirmation"
                                 required />
                    </div>

                    <!-- Terms -->
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <label class="flex items-start">
                                <x-checkbox name="terms" required />
                                <span class="ml-2 text-sm text-gray-600">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a href="'.route('terms.show').'" class="text-pink-600 underline">Terms</a>',
                                        'privacy_policy' => '<a href="'.route('policy.show').'" class="text-pink-600 underline">Privacy Policy</a>',
                                    ]) !!}
                                </span>
                            </label>
                        </div>
                    @endif

                    <div class="mt-6">
                        <button type="submit"
                                class="w-full py-3 bg-pink-500 hover:bg-pink-600 text-white font-bold rounded-lg">
                            Register
                        </button>
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('login') }}"
                           class="text-sm text-gray-600 hover:text-pink-600 underline">
                            Already registered? Login
                        </a>
                    </div>

                </form>
            </div>
        </div>

    </div>
</x-guest-layout>
