<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Rol -->
        <div class="mt-4">
            <x-input-label for="rol" :value="__('Rol')" />
            <select id="rol" name="rol" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                <option value="">Selecciona tu rol</option>
                <option value="estudiante" {{ old('rol') == 'estudiante' ? 'selected' : '' }}>Estudiante</option>
                <option value="tutor" {{ old('rol') == 'tutor' ? 'selected' : '' }}>Tutor</option>
            </select>
            <x-input-error :messages="$errors->get('rol')" class="mt-2" />
        </div>

        <!-- Facultad -->
        <div class="mt-4">
            <x-input-label for="facultad" :value="__('Facultad')" />
            <select id="facultad" name="facultad" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                <option value="">Selecciona tu facultad</option>
                <option value="arquitectura" {{ old('facultad') == 'arquitectura' ? 'selected' : '' }}>Arquitectura y Urbanismo</option>
                <option value="ciencias" {{ old('facultad') == 'ciencias' ? 'selected' : '' }}>Ciencias</option>
                <option value="ciencias_economicas" {{ old('facultad') == 'ciencias_economicas' ? 'selected' : '' }}>Ciencias Económicas</option>
                <option value="ciencias_sociales" {{ old('facultad') == 'ciencias_sociales' ? 'selected' : '' }}>Ciencias Sociales</option>
                <option value="derecho" {{ old('facultad') == 'derecho' ? 'selected' : '' }}>Derecho y Ciencia Política</option>
                <option value="educacion" {{ old('facultad') == 'educacion' ? 'selected' : '' }}>Educación</option>
                <option value="humanidades" {{ old('facultad') == 'humanidades' ? 'selected' : '' }}>Humanidades</option>
                <option value="ingenieria_civil" {{ old('facultad') == 'ingenieria_civil' ? 'selected' : '' }}>Ingeniería Civil</option>
                <option value="ingenieria_electronica" {{ old('facultad') == 'ingenieria_electronica' ? 'selected' : '' }}>Ingeniería Electrónica e Informática</option>
                <option value="ingenieria_geografica" {{ old('facultad') == 'ingenieria_geografica' ? 'selected' : '' }}>Ingeniería Geográfica, Ambiental y Ecoturismo</option>
                <option value="ingenieria_industrial" {{ old('facultad') == 'ingenieria_industrial' ? 'selected' : '' }}>Ingeniería Industrial y de Sistemas</option>
                <option value="medicina" {{ old('facultad') == 'medicina' ? 'selected' : '' }}>Medicina Humana</option>
                <option value="medicina_veterinaria" {{ old('facultad') == 'medicina_veterinaria' ? 'selected' : '' }}>Medicina Veterinaria</option>
                <option value="oceanografia" {{ old('facultad') == 'oceanografia' ? 'selected' : '' }}>Oceanografía, Pesquería, Ciencias Alimentarias y Acuicultura</option>
                <option value="odontologia" {{ old('facultad') == 'odontologia' ? 'selected' : '' }}>Odontología</option>
                <option value="psicologia" {{ old('facultad') == 'psicologia' ? 'selected' : '' }}>Psicología</option>
                <option value="tecnologia_medica" {{ old('facultad') == 'tecnologia_medica' ? 'selected' : '' }}>Tecnología Médica</option>
            </select>
            <x-input-error :messages="$errors->get('facultad')" class="mt-2" />
        </div>

        <!-- Escuela -->
        <div class="mt-4">
            <x-input-label for="escuela" :value="__('Escuela Profesional')" />
            <x-text-input id="escuela" class="block mt-1 w-full" type="text" name="escuela" :value="old('escuela')" required placeholder="Ej: Ingeniería de Sistemas" />
            <x-input-error :messages="$errors->get('escuela')" class="mt-2" />
        </div>

        <!-- Ciclo -->
        <div class="mt-4">
            <x-input-label for="ciclo" :value="__('Ciclo Académico')" />
            <select id="ciclo" name="ciclo" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                <option value="">Selecciona tu ciclo</option>
                @for ($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}" {{ old('ciclo') == $i ? 'selected' : '' }}>{{ $i }}° Ciclo</option>
                @endfor
                <option value="egresado" {{ old('ciclo') == 'egresado' ? 'selected' : '' }}>Egresado</option>
            </select>
            <x-input-error :messages="$errors->get('ciclo')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('¿Ya estás registrado?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
