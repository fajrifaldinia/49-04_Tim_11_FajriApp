<x-guest-layout>

    <h2 style="text-align: center;">Registrasi</h2>
    <p style="text-align: center;">Silakan buat akun baru Anda.</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />

            <x-text-input
                id="name"
                class="block mt-1 w-full"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
            />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />

            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autocomplete="username"
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
                autocomplete="new-password"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input
                id="password_confirmation"
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
            />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Tombol Register -->
        <div style="display: flex; justify-content: center; width: 100%; margin-top: 24px;">
            <x-primary-button>
                Register
            </x-primary-button>
        </div>

    </form>

    <!-- Link Login -->
    <div style="text-align: center; margin-top: 24px;">
        <span class="text-sm text-gray-600">
            Sudah punya akun?
        </span>

        <a
            href="{{ route('login') }}"
            style="color: #2563eb; font-weight: 600; text-decoration: underline;"
        >
            Login
        </a>
    </div>

    <!-- Kembali ke Halaman Utama -->
    <div style="text-align: center; margin-top: 16px;">
        <a
            href="{{ url('/') }}"
            style="color: #64748b; text-decoration: underline;"
        >
            ← Kembali ke Halaman Utama
        </a>
    </div>

</x-guest-layout>