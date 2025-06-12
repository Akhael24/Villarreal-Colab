<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mi Aplicación</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold text-indigo-600">Mi App</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700">Hola, {{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition duration-300">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            Cerrar Sesión
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <div class="border-4 border-dashed border-gray-200 rounded-lg p-8">
                <div class="text-center">
                    <i class="fas fa-tachometer-alt text-6xl text-indigo-600 mb-4"></i>
                    <h1 class="text-3xl font-bold text-gray-900 mb-4">¡Bienvenido al Dashboard!</h1>
                    <p class="text-lg text-gray-600 mb-8">
                        Has iniciado sesión exitosamente. Aquí puedes gestionar tu cuenta y acceder a todas las funcionalidades.
                    </p>

                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="p-5">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-user text-2xl text-indigo-600"></i>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                        <dl>
                                            <dt class="text-sm font-medium text-gray-500 truncate">
                                                Perfil
                                            </dt>
                                            <dd class="text-lg font-medium text-gray-900">
                                                Completo
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="p-5">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-tasks text-2xl text-green-600"></i>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                        <dl>
                                            <dt class="text-sm font-medium text-gray-500 truncate">
                                                Tareas
                                            </dt>
                                            <dd class="text-lg font-medium text-gray-900">
                                                0 pendientes
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="p-5">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-bell text-2xl text-yellow-600"></i>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                        <dl>
                                            <dt class="text-sm font-medium text-gray-500 truncate">
                                                Notificaciones
                                            </dt>
                                            <dd class="text-lg font-medium text-gray-900">
                                                0 nuevas
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="mt-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Acciones Rápidas</h3>
                        <div class="flex flex-wrap justify-center gap-4">
                            <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg transition duration-300">
                                <i class="fas fa-plus mr-2"></i>
                                Nuevo Proyecto
                            </button>
                            <button class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition duration-300">
                                <i class="fas fa-cog mr-2"></i>
                                Configuración
                            </button>
                            <a href="{{ route('welcome') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg transition duration-300">
                                <i class="fas fa-home mr-2"></i>
                                Volver al Inicio
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
