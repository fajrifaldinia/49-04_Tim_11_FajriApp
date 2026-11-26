<x-guest-layout>

    <h2 style="text-align: center;">Login Admin</h2>
    <p style="text-align: center;">Silakan masuk menggunakan akun Admin.</p>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div>
            <x-input-label for="email" value="Email" />

            <x-text-input
                id="email"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
            />

            <x-input-error :messages="$errors->get('email')" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" value="Password" />

            <div style="position: relative; width: 100%;">
                <x-text-input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    style="padding-right: 45px; width: 100%;"
                />

                <button
                    type="button"
                    id="togglePassword"
                    onclick="togglePasswordVisibility()"
                    aria-label="Tampilkan password"
                    style="
                        position: absolute;
                        right: 12px;
                        top: 50%;
                        transform: translateY(-50%);
                        background: none;
                        border: none;
                        cursor: pointer;
                        color: #64748b;
                        padding: 5px;
                    "
                >
                    <svg
                        id="eyeIcon"
                        xmlns="http://www.w3.org/2000/svg"
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="#64748b"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <path d="M3 3l18 18"/>
                        <path d="M10.6 10.6a2 2 0 002.8 2.8"/>
                        <path d="M9.9 5.2A10.8 10.8 0 0112 5c6.5 0 10 7 10 7a15 15 0 01-3 3.8"/>
                        <path d="M6.2 6.2C3.5 8 2 12 2 12s3.5 7 10 7a10 10 0 004-.8"/>
                    </svg>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password')" />
        </div>

        <!-- Remember Me -->
        <div class="mt-4">
            <label>
                <input type="checkbox" name="remember">
                Remember me
            </label>
        </div>

        <!-- Tombol Login -->
        <div style="display: flex; justify-content: center; width: 100%; margin-top: 24px;">
            <button
                type="submit"
                style="
                    background-color: #2563eb;
                    color: white;
                    padding: 10px 30px;
                    border: none;
                    border-radius: 6px;
                    cursor: pointer;
                    font-size: 16px;
                "
            >
                Login
            </button>
        </div>

    </form>

    <!-- Kembali ke Halaman Utama -->
    <div style="text-align: center; margin-top: 24px;">
        <a
            href="{{ url('/') }}"
            style="color: #64748b; text-decoration: underline;"
        >
            ← Kembali ke Halaman Utama
        </a>
    </div>

    <!-- JavaScript Show / Hide Password -->
    <script>
        function togglePasswordVisibility() {
            const password = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            const button = document.getElementById('togglePassword');

            if (password.type === 'password') {
                password.type = 'text';
                button.setAttribute('aria-label', 'Sembunyikan password');

                eyeIcon.innerHTML = `
                    <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z"/>
                    <circle cx="12" cy="12" r="3"/>
                `;
            } else {
                password.type = 'password';
                button.setAttribute('aria-label', 'Tampilkan password');

                eyeIcon.innerHTML = `
                    <path d="M3 3l18 18"/>
                    <path d="M10.6 10.6a2 2 0 002.8 2.8"/>
                    <path d="M9.9 5.2A10.8 10.8 0 0112 5c6.5 0 10 7 10 7a15 15 0 01-3 3.8"/>
                    <path d="M6.2 6.2C3.5 8 2 12 2 12s3.5 7 10 7a10 10 0 004-.8"/>
                `;
            }
        }
    </script>

</x-guest-layout>
