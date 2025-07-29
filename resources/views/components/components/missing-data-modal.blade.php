@props(['faltanDatos'])

@if($faltanDatos)
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
@vite(['resources/js/validaciones'])

<div x-data="{ open: true }"
    x-show="open"
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
    style="display: none;">

    <div class="bg-white dark:bg-gray-900 border-2 border-indigo-500 rounded-xl p-8 max-w-lg w-full shadow-2xl space-y-6">

        <div class="flex items-center space-x-3">
            <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v2m0 4h.01M5.07 20h13.86a2 2 0 001.74-2.82L13.73 4.41a2 2 0 00-3.46 0L3.33 17.18A2 2 0 005.07 20z" />
            </svg>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Datos incompletos</h2>
        </div>

        <p class="text-sm text-gray-600 dark:text-gray-300">Por favor completa la siguiente información para continuar.</p>

        <form method="POST" action="{{ route('user.updateMissing') }}" class="space-y-4">
            @csrf

            <div>
                <label for="numero_empleado" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Número de Empleado *</label>
                <input id="numero_empleado" name="numero_empleado" type="text"
                    value="{{ old('numero_empleado', auth()->user()->numero_empleado) }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required maxlength="3">
            </div>

            <div>
                <label for="puesto" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Puesto</label>
                <input id="puesto" name="puesto" type="text" value="{{ old('puesto', auth()->user()->puesto) }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required maxlength="50">
            </div>

            <div>
                <label for="departamento" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Departamento</label>
                <select id="departamento" name="departamento" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    <option value="">-- Selecciona un departamento --</option>
                    <option value="Sistemas"
                        {{ old('departamento', auth()->user()->departamento) == 'Sistemas' ? 'selected' : '' }}>
                        Sistemas</option>
                    <option value="Contabilidad"
                        {{ old('departamento', auth()->user()->departamento) == 'Contabilidad' ? 'selected' : '' }}>
                        Contabilidad</option>
                    <option value="Marketing"
                        {{ old('departamento', auth()->user()->departamento) == 'Marketing' ? 'selected' : '' }}>
                        Marketing</option>
                </select>
            </div>

            <div>
                <label for="telefono" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Teléfono</label>
                <input id="telefono" name="telefono" type="text" value="{{ old('telefono', auth()->user()->telefono) }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required maxlength="10" minlength="10">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md shadow-sm">
                    Guardar datos
                </button>
            </div>
        </form>
    </div>
</div>

<script src="//unpkg.com/alpinejs" defer></script>
@endif