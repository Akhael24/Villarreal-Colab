<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Villarreal Colab</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('logo.png') }}" alt="Villarreal Colab Logo" class="w-10 h-10 object-contain">
                        <h1 class="text-2xl font-bold text-indigo-600">Villarreal Colab</h1>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    @auth
                        <span class="text-gray-700">Hola, {{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition duration-300">
                                Cerrar Sesión
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-lg transition duration-300">
                            Iniciar Sesión
                        </a>
                        <a href="{{ route('register') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition duration-300">
                            Registrarse
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6">
                Bienvenido a <span class="text-indigo-600">Villarreal Colab</span>
            </h1>
            <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
                Una plataforma moderna y fácil de usar diseñada para compartir tus ideas y ayudar a otros estudiantes.
                Únete para apoyar o ser apoyado.
            </p>

            @auth
                <div class="space-x-4">
                    <a href="{{ route('dashboard') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-lg text-lg font-medium transition duration-300 inline-block">
                        <i class="fas fa-tachometer-alt mr-2"></i>
                        Ir al Dashboard
                    </a>
                </div>
            @else
                <div class="space-x-4">
                    <a href="{{ route('register') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-lg text-lg font-medium transition duration-300 inline-block">
                        <i class="fas fa-rocket mr-2"></i>
                        Empezar Ahora
                    </a>
                    <a href="{{ route('login') }}" class="bg-white hover:bg-gray-50 text-indigo-600 px-8 py-3 rounded-lg text-lg font-medium border-2 border-indigo-600 transition duration-300 inline-block">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Iniciar Sesión
                    </a>
                </div>
            @endauth
        </div>
    </div>

    <!-- Features Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">¿Cómo te ayudamos?</h2>
            <p class="text-lg text-gray-600">Conectamos estudiantes de la UNFV para crear una red de apoyo académico colaborativo</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
                <div class="text-green-600 text-4xl mb-4">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Colaboración Académica</h3>
                <p class="text-gray-600">Encuentra compañeros de tu carrera para trabajar juntos en proyectos, resolver dudas y compartir conocimientos de manera efectiva.</p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
                <div class="text-blue-600 text-4xl mb-4">
                    <i class="fab fa-microsoft"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Tutorías con Teams</h3>
                <p class="text-gray-600">Crea o únete a salas de Microsoft Teams para sesiones de tutoría personalizadas y grupos de estudio organizados por materia.</p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
                <div class="text-orange-600 text-4xl mb-4">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Comunidad UNFV</h3>
                <p class="text-gray-600">Forma parte de una red exclusiva de estudiantes villarrealinos comprometidos con el éxito académico mutuo y el crecimiento profesional.</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="flex items-center justify-center space-x-3 mb-4">
                    <img src="{{ asset('logo.png') }}" alt="Villarreal Colab Logo" class="w-8 h-8 object-contain">
                    <span class="text-lg font-semibold">Villarreal Colab</span>
                </div>
                <p>&copy; {{ date('Y') }} Villarreal Colab. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
</body>
</html>
