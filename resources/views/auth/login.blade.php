<x-guest-layout>
    <div class="login-card p-4 shadow">
        <h4 class="text-center mb-4">Iniciar sesión</h4>

        <!-- Mostrar error personalizado -->
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show small" role="alert">
            {{ session('error') }}
        </div>
        @endif

        <!-- Session Status -->
        <x-auth-session-status class="mb-3" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-3">
                <x-input-label for="email" :value="__('Usuario')" class="form-label" />
                <x-text-input id="email" class="form-control login-input" type="text" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="text-danger small mt-1" />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <x-input-label for="password" :value="__('Password')" class="form-label" />

                <div class="input-group">
                    <x-text-input id="password" class="form-control login-input" type="password" name="password" required autocomplete="current-password" />
                    <button type="button" class="btn btn-outline-secondary" id="toggle-password" tabindex="-1" onclick="togglePassword('password','icono')">
                        <i class="fa-solid fa-eye" id="icono"></i>
                    </button>
                </div>

                <x-input-error :messages="$errors->get('password')" class="text-danger small mt-1" />
            </div>

            <!-- Remember Me -->
            <div class="form-check mb-3">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember" />
                <label for="remember_me" class="form-check-label">{{ __('Recordarme') }}</label>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                @if (Route::has('password.request'))
                <a class="small text-decoration-none" href="{{ route('password.request') }}">
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
                @endif
            </div>

            <div class="d-grid mb-3">
                <x-primary-button class="btn btn-login">
                    {{ __('Iniciar sesión') }}
                </x-primary-button>
            </div>
        </form>

        <hr>

        <!-- Login Google -->
        <a href="{{ route('google.login') }}" class="btn btn-google w-100">
            <i class="fab fa-google me-2"></i> Iniciar sesión con Google
        </a>
    </div>

</x-guest-layout>