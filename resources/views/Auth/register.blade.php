@extends('layouts.guest')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block font-medium text-sm text-gray-700">{{ __('Nombre') }}</label>
            <input id="name" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
            @error('name')
                <div class="text-sm text-red-600 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email" class="block font-medium text-sm text-gray-700">{{ __('Email') }}</label>
            <input id="email" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
            @error('email')
                <div class="text-sm text-red-600 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <!-- Rol (oculto, se asigna automáticamente) -->
        <input type="hidden" id="rol" name="rol" value="{{ old('rol') }}" />

        <!-- Facultad -->
        <div class="mt-4">
            <label for="facultad" class="block font-medium text-sm text-gray-700">{{ __('Facultad') }}</label>
            <select id="facultad" name="facultad" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                <option value="">Selecciona tu facultad</option>
                <option value="administracion" {{ old('facultad') == 'administracion' ? 'selected' : '' }}>Administración</option>
                <option value="arquitectura" {{ old('facultad') == 'arquitectura' ? 'selected' : '' }}>Arquitectura y Urbanismo</option>
                <option value="ciencias_economicas" {{ old('facultad') == 'ciencias_economicas' ? 'selected' : '' }}>Ciencias Económicas</option>
                <option value="ciencias_financieras" {{ old('facultad') == 'ciencias_financieras' ? 'selected' : '' }}>Ciencias Financieras y Contables</option>
                <option value="ciencias_naturales" {{ old('facultad') == 'ciencias_naturales' ? 'selected' : '' }}>Ciencias Naturales y Matemática</option>
                <option value="ciencias_sociales" {{ old('facultad') == 'ciencias_sociales' ? 'selected' : '' }}>Ciencias Sociales</option>
                <option value="derecho" {{ old('facultad') == 'derecho' ? 'selected' : '' }}>Derecho y Ciencias Políticas</option>
                <option value="educacion" {{ old('facultad') == 'educacion' ? 'selected' : '' }}>Educación</option>
                <option value="humanidades" {{ old('facultad') == 'humanidades' ? 'selected' : '' }}>Humanidades</option>
                <option value="ingenieria_civil" {{ old('facultad') == 'ingenieria_civil' ? 'selected' : '' }}>Ingeniería Civil</option>
                <option value="ingenieria_electronica" {{ old('facultad') == 'ingenieria_electronica' ? 'selected' : '' }}>Ingeniería Electrónica e Informática</option>
                <option value="ingenieria_geografica" {{ old('facultad') == 'ingenieria_geografica' ? 'selected' : '' }}>Ingeniería Geográfica, Ambiental y Ecoturismo</option>
                <option value="ingenieria_industrial" {{ old('facultad') == 'ingenieria_industrial' ? 'selected' : '' }}>Ingeniería Industrial y de Sistemas</option>
                <option value="medicina" {{ old('facultad') == 'medicina' ? 'selected' : '' }}>Medicina "Hipólito Unanue"</option>
                <option value="oceanografia" {{ old('facultad') == 'oceanografia' ? 'selected' : '' }}>Oceanografía, Pesquería, Ciencias Alimentarias y Acuicultura</option>
                <option value="odontologia" {{ old('facultad') == 'odontologia' ? 'selected' : '' }}>Odontología</option>
                <option value="psicologia" {{ old('facultad') == 'psicologia' ? 'selected' : '' }}>Psicología</option>
                <option value="tecnologia_medica" {{ old('facultad') == 'tecnologia_medica' ? 'selected' : '' }}>Tecnología Médica</option>
            </select>
            @error('facultad')
                <div class="text-sm text-red-600 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <!-- Escuela -->
        <div class="mt-4">
            <label for="escuela" class="block font-medium text-sm text-gray-700">{{ __('Escuela Profesional') }}</label>
            <select id="escuela" name="escuela" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required disabled>
                <option value="">Primero selecciona una facultad</option>
            </select>
            @error('escuela')
                <div class="text-sm text-red-600 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <!-- Ciclo -->
        <div class="mt-4">
            <label for="ciclo" class="block font-medium text-sm text-gray-700">{{ __('Ciclo Académico') }}</label>
            <select id="ciclo" name="ciclo" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                <option value="">Selecciona tu ciclo</option>
                @for ($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}" {{ old('ciclo') == $i ? 'selected' : '' }}>{{ $i }}° Ciclo</option>
                @endfor
                <option value="egresado" {{ old('ciclo') == 'egresado' ? 'selected' : '' }}>Egresado</option>
            </select>
            @error('ciclo')
                <div class="text-sm text-red-600 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" class="block font-medium text-sm text-gray-700">{{ __('Contraseña') }}</label>
            <input id="password" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="password" name="password" required autocomplete="new-password" />
            @error('password')
                <div class="text-sm text-red-600 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation" class="block font-medium text-sm text-gray-700">{{ __('Confirmar Contraseña') }}</label>
            <input id="password_confirmation" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="password" name="password_confirmation" required autocomplete="new-password" />
            @error('password_confirmation')
                <div class="text-sm text-red-600 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('¿Ya estás registrado?') }}
            </a>

            <button type="submit" class="ms-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ __('Registrar') }}
            </button>
        </div>
    </form>

    <script>
        // Definir las escuelas profesionales por facultad
        const escuelasPorFacultad = {
            'administracion': [
                'Administración de Empresas',
                'Administración Pública',
                'Administración de Turismo',
                'Negocios Internacionales',
                'Marketing'
            ],
            'arquitectura': [
                'Arquitectura'
            ],
            'ciencias_economicas': [
                'Economía'
            ],
            'ciencias_financieras': [
                'Contabilidad'
            ],
            'ciencias_naturales': [
                'Biología',
                'Física',
                'Matemática',
                'Estadística',
                'Química'
            ],
            'ciencias_sociales': [
                'Ciencias de la Comunicación',
                'Sociología',
                'Trabajo Social'
            ],
            'derecho': [
                'Derecho',
                'Ciencia Política'
            ],
            'educacion': [
                'Educación Inicial',
                'Educación Primaria',
                'Educación Secundaria',
                'Educación Física'
            ],
            'humanidades': [
                'Antropología',
                'Arqueología',
                'Filosofía',
                'Lingüística',
                'Literatura',
                'Historia'
            ],
            'ingenieria_civil': [
                'Ingeniería Civil'
            ],
            'ingenieria_electronica': [
                'Ingeniería Electrónica',
                'Ingeniería Informática',
                'Ingeniería Mecatrónica',
                'Ingeniería de Telecomunicaciones'
            ],
            'ingenieria_geografica': [
                'Ingeniería Geográfica',
                'Ingeniería Ambiental',
                'Ingeniería en Ecoturismo'
            ],
            'ingenieria_industrial': [
                'Ingeniería de Sistemas',
                'Ingeniería Industrial',
                'Ingeniería Agroindustrial',
                'Ingeniería de Transporte'
            ],
            'medicina': [
                'Medicina',
                'Enfermería',
                'Nutrición',
                'Obstetricia'
            ],
            'oceanografia': [
                'Ingeniería Pesquera',
                'Ingeniería Alimentaria',
                'Ingeniería en Acuicultura'
            ],
            'odontologia': [
                'Odontología'
            ],
            'psicologia': [
                'Psicología'
            ],
            'tecnologia_medica': [
                'Terapia Física y Rehabilitación',
                'Radiología',
                'Optometría',
                'Terapia del lenguaje',
                'Laboratorio y Anatomía Patológica'
            ]
        };

        // Función para actualizar las escuelas según la facultad seleccionada
        function actualizarEscuelas() {
            const facultadSelect = document.getElementById('facultad');
            const escuelaSelect = document.getElementById('escuela');
            const facultadSeleccionada = facultadSelect.value;

            // Limpiar opciones de escuela
            escuelaSelect.innerHTML = '';

            if (facultadSeleccionada && escuelasPorFacultad[facultadSeleccionada]) {
                // Habilitar el select de escuela
                escuelaSelect.disabled = false;

                // Agregar opción por defecto
                const defaultOption = document.createElement('option');
                defaultOption.value = '';
                defaultOption.textContent = 'Selecciona tu escuela profesional';
                escuelaSelect.appendChild(defaultOption);

                // Agregar escuelas de la facultad seleccionada
                escuelasPorFacultad[facultadSeleccionada].forEach(escuela => {
                    const option = document.createElement('option');
                    option.value = escuela.toLowerCase().replace(/\s+/g, '_').replace(/"/g, '');
                    option.textContent = escuela;

                    // Mantener selección previa si existe
                    if ('{{ old("escuela") }}' === option.value) {
                        option.selected = true;
                    }

                    escuelaSelect.appendChild(option);
                });
            } else {
                // Deshabilitar el select de escuela
                escuelaSelect.disabled = true;
                const defaultOption = document.createElement('option');
                defaultOption.value = '';
                defaultOption.textContent = 'Primero selecciona una facultad';
                escuelaSelect.appendChild(defaultOption);
            }
        }

        // Función para asignar rol automáticamente según el ciclo
        function asignarRolAutomatico() {
            const cicloSelect = document.getElementById('ciclo');
            const rolInput = document.getElementById('rol');
            const cicloSeleccionado = cicloSelect.value;

            if (cicloSeleccionado >= 1 && cicloSeleccionado <= 7) {
                rolInput.value = 'estudiante';
            } else if (cicloSeleccionado >= 8 && cicloSeleccionado <= 9) {
                rolInput.value = 'tutor';
            } else if (cicloSeleccionado == 10 || cicloSeleccionado === 'egresado') {
                rolInput.value = 'tutor';
            }
        }

        // Event listeners
        document.getElementById('facultad').addEventListener('change', actualizarEscuelas);
        document.getElementById('ciclo').addEventListener('change', asignarRolAutomatico);

        // Inicializar al cargar la página (para mantener valores después de errores de validación)
        document.addEventListener('DOMContentLoaded', function() {
            actualizarEscuelas();
            asignarRolAutomatico();
        });
    </script>
@endsection
