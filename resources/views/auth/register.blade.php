<x-guest-layout>

    <div class="text-center mb-6">
        <h2 class="text-2xl font-bold text-blue-600">Create Account</h2>
        <p class="text-gray-500 text-sm">Join OrderTrack System</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <x-input-label for="name" value="Name" />

            <input
                id="name"
                type="text"
                name="name"
                required
                autofocus
                class="mt-1 block w-full bg-white text-gray-900 border border-gray-300 rounded-lg
                       focus:border-blue-500 focus:ring-blue-500"
            />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" value="Email" />

            <input
                id="email"
                type="email"
                name="email"
                required
                class="mt-1 block w-full bg-white text-gray-900 border border-gray-300 rounded-lg
                       focus:border-blue-500 focus:ring-blue-500"
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" value="Password" />

            <input
                id="password"
                type="password"
                name="password"
                required
                class="mt-1 block w-full bg-white text-gray-900 border border-gray-300 rounded-lg
                       focus:border-blue-500 focus:ring-blue-500"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" value="Confirm Password" />

            <input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                required
                class="mt-1 block w-full bg-white text-gray-900 border border-gray-300 rounded-lg
                       focus:border-blue-500 focus:ring-blue-500"
            />
        </div>

        <div class="mt-6">
            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                Register
            </button>
        </div>

    </form>

    <p class="text-center text-sm text-gray-500 mt-4">
        Already have an account?
        <a href="/login" class="text-blue-600 hover:underline">
            Login here
        </a>
    </p>

</x-guest-layout>
