<x-guest-layout>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    @vite(['resources/js/validaciones'])

    <div class="register-card">
        <h4 class="text-center mb-4">Crear cuenta</h4>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <!-- Nombre -->
            <div class="mt-3">
                <label for="nombre" class="register-label">{{ __('Nombre') }}</label>
                <x-text-input id="nombre" class="register-input" type="text" name="nombre" :value="old('nombre')" required maxlength="50" />
                <x-input-error :messages="$errors->get('nombre')" class="mt-1" />
            </div>

            <!-- Apellido Paterno -->
            <div class="mt-3">
                <label for="apellido_paterno" class="register-label">{{ __('Apellido Paterno') }}</label>
                <x-text-input id="apellido_paterno" class="register-input" type="text" name="apellido_paterno" :value="old('apellido_paterno')" required maxlength="50" />
                <x-input-error :messages="$errors->get('apellido_paterno')" class="mt-1" />
            </div>

            <!-- Apellido Materno -->
            <div class="mt-3">
                <label for="apellido_materno" class="register-label">{{ __('Apellido Materno') }}</label>
                <x-text-input id="apellido_materno" class="register-input" type="text" name="apellido_materno" :value="old('apellido_materno')" maxlength="50" />
                <x-input-error :messages="$errors->get('apellido_materno')" class="mt-1" />
            </div>

            <!-- usuario/correo -->
            <div class="mt-3">
                <label for="email" class="register-label">{{ __('Nombre de usuario') }}</label>
                <x-text-input id="email" class="register-input" type="text" name="email" :value="old('email')" required maxlength="100" />
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <!-- Número de Empleado -->
            <div class="mt-3">
                <label for="numero_empleado" class="register-label">{{ __('Número de Empleado') }}</label>
                <x-text-input id="numero_empleado" class="register-input" type="number" name="numero_empleado" :value="old('numero_empleado')" required maxlength="3" />
                <x-input-error :messages="$errors->get('numero_empleado')" class="mt-1" />
            </div>

            <!-- Puesto -->
            <div class="mt-3">
                <label for="puesto" class="register-label">{{ __('Puesto') }}</label>
                <x-text-input id="puesto" class="register-input" type="text" name="puesto" :value="old('puesto')" required maxlength="50" />
                <x-input-error :messages="$errors->get('puesto')" class="mt-1" />
            </div>

            <!-- Departamento -->
            <div class="mt-3">
                <label for="departamento" class="register-label">{{ __('Departamento') }}</label>
                <select id="departamento" name="departamento" class="register-input" required>
                    <option value="">-- Selecciona un departamento --</option>
                    <option value="Sistemas" {{ old('departamento') == 'Sistemas' ? 'selected' : '' }}>Sistemas</option>
                    <option value="Contabilidad" {{ old('departamento') == 'Contabilidad' ? 'selected' : '' }}>Contabilidad</option>
                    <option value="Marketing" {{ old('departamento') == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                </select>
                <x-input-error :messages="$errors->get('departamento')" class="mt-1" />
            </div>

            <!-- Teléfono -->
            <div class="mt-3">
                <label for="telefono" class="register-label">{{ __('Teléfono') }}</label>
                <x-text-input id="telefono" class="register-input" type="text" name="telefono" :value="old('telefono')" maxlength="10" minlength="10" />
                <x-input-error :messages="$errors->get('telefono')" class="mt-1" />
            </div>

            <!-- Contraseña -->
            <div class="mb-3">
                <label for="password" class="register-label">{{ __('Contraseña') }}</label>

                <div class="input-group">
                    <x-text-input id="password" class="register-input" type="password" class="form-control" name="password" required autocomplete="new-password" />
                    <button type="button" class="btn btn-outline-secondary" id="toggle-password" tabindex="-1" onclick="togglePassword('password', 'icono')">
                        <i class="fa-solid fa-eye" id="icono"></i>
                    </button>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>

            <!-- Confirmar Contraseña -->
            <div class="mb-3">
                <label for="password_confirmation" class="register-label">{{ __('Confirmar Contraseña') }}</label>

                <div class="input-group">
                    <x-text-input id="password_confirmation" class="register-input" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" />
                    <button type="button" class="btn btn-outline-secondary" id="toggle-password-confirmation" tabindex="-1" onclick="togglePassword('password_confirmation', 'icono-confirmed')">
                        <i class="fa-solid fa-eye" id="icono-confirmed"></i>
                    </button>
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
            </div>

            <!-- Botón -->
            <div class="d-flex justify-content-between align-items-center mt-4">
                <button type="submit" class="btn-register">
                    {{ __('Registrarse') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>