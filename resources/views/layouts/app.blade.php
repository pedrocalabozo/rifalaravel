<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rifa Facil - Plataforma de Rifas Online</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
        }

        .raffle-card {
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .raffle-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .ticket-number {
            background-color: #e0e7ff;
            color: #4f46e5;
            font-weight: 600;
        }

        .payment-method {
            border: 2px solid #e2e8f0;
            transition: all 0.2s ease;
        }

        .payment-method:hover {
            border-color: #4f46e5;
            background-color: #f5f3ff;
        }

        .payment-method.selected {
            border-color: #4f46e5;
            background-color: #f5f3ff;
        }

        .animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        .draw-animation {
            animation: draw 1.5s ease-in-out infinite;
        }

        @keyframes draw {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }
    </style>
    @livewireStyles

</head>

<body>
    <!-- Header/Navigation -->
    <header class="gradient-bg text-white">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-ticket-alt text-2xl"></i>
                    <h1 class="text-2xl font-bold">Rifa Facil</h1>
                </div>
                <nav class="hidden md:flex space-x-6">
                    <a href="#" class="hover:text-indigo-200 font-medium">Inicio</a>
                    <a href="#rifas" class="hover:text-indigo-200 font-medium">Rifas</a>
                    <a href="#ganadores" class="hover:text-indigo-200 font-medium">Ganadores</a>
                    <a href="#reglas" class="hover:text-indigo-200 font-medium">Reglas</a>
                </nav>

                @livewire('logingoogle')





            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden bg-indigo-800 md:hidden">
            <div class="container mx-auto px-4 py-2 flex flex-col space-y-3">
                <a href="#" class="text-white py-2 hover:bg-indigo-700 px-2 rounded">Inicio</a>
                <a href="#rifas" class="text-white py-2 hover:bg-indigo-700 px-2 rounded">Rifas</a>
                <a href="#ganadores" class="text-white py-2 hover:bg-indigo-700 px-2 rounded">Ganadores</a>
                <a href="#reglas" class="text-white py-2 hover:bg-indigo-700 px-2 rounded">Reglas</a>



                <li><a href="{{ route('raffles.index') }}">Rifas</a></li>
                    <li><a href="{{ route('profile.edit') }}">Perfil</a></li>

                    @if(auth()->check() && auth()->user()->google_id)
                    <li><a>Cerrar Sesión</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf  </form>
                @else
                <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
                    @endif
            </div>
        </div>
    </header>














            @yield('content')
      <!-- Footer -->
<footer class="bg-gray-800 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4">Rifa Facil</h3>
                <p class="text-gray-400">La plataforma más fácil y segura para participar en rifas online en
                    Venezuela.</p>
            </div>

            <div>
                <h4 class="text-lg font-semibold mb-4">Enlaces Rápidos</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Inicio</a></li>
                    <li><a href="#rifas" class="text-gray-400 hover:text-white transition">Rifas</a></li>
                    <li><a href="#ganadores" class="text-gray-400 hover:text-white transition">Ganadores</a></li>
                    <li><a href="#reglas" class="text-gray-400 hover:text-white transition">Reglas</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-semibold mb-4">Contacto</h4>
                <ul class="space-y-2">
                    <li class="flex items-center">
                        <i class="fas fa-envelope mr-2 text-gray-400"></i>
                        <span class="text-gray-400">contacto@rifafacil.com</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-phone mr-2 text-gray-400"></i>
                        <span class="text-gray-400">+58 412-1234567</span>
                    </li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-semibold mb-4">Síguenos</h4>
                <div class="flex space-x-4">
                    <a href="#"
                        class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-indigo-600 transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-400 transition">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-pink-600 transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; 2023 Rifa Facil. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>
















@livewireScripts
</body>

</html>
