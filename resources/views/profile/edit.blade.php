{{-- @extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Editar Perfil</h1>

    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('profile.update', auth()->user()->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="first_name" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" name="first_name" id="first_name" value="{{ old('first_name', auth()->user()->first_name) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>
        </div>

        <div class="mb-4">
            <label for="last_name" class="block text-sm font-medium text-gray-700">Apellido</label>
            <input type="text" name="last_name" id="last_name" value="{{ old('last_name', auth()->user()->last_name) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-sm font-medium text-gray-700">Teléfono</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', auth()->user()->phone) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>
        </div>

        <div class="mb-4">
            <label for="national_id" class="block text-sm font-medium text-gray-700">Número de Identificación</label>
            <input type="text" name="national_id" id="national_id" value="{{ old('national_id', auth()->user()->national_id) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>
        </div>

        <div class="mb-4">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Actualizar Perfil
            </button>
        </div>
    </form>
</div>
@endsection --}}
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil - Rifa Facil</title>
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

        .activity-item {
            position: relative;
            padding-left: 2rem;
        }

        .activity-item:before {
            content: "";
            position: absolute;
            left: 0.5rem;
            top: 0;
            bottom: 0;
            width: 2px;
            background-color: #e2e8f0;
        }

        .activity-item:first-child:before {
            top: 1.5rem;
        }

        .activity-item:last-child:before {
            bottom: calc(100% - 1.5rem);
        }

        .activity-dot {
            position: absolute;
            left: 0;
            top: 0.25rem;
            width: 1rem;
            height: 1rem;
            border-radius: 50%;
            border: 3px solid #4f46e5;
            background: white;
            z-index: 1;
        }

        .tab-button {
            position: relative;
            padding-bottom: 0.5rem;
        }

        .tab-button.active:after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background-color: #4f46e5;
        }

        .won-badge {
            background-color: #10b981;
            color: white;
        }

        .pending-badge {
            background-color: #f59e0b;
            color: white;
        }

        .lost-badge {
            background-color: #ef4444;
            color: white;
        }
    </style>
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
                <div class="flex items-center space-x-4">
                    <div class="relative group">
                        <button class="flex items-center space-x-2">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Usuario" class="w-8 h-8 rounded-full">
                            <span class="font-medium">María G.</span>
                            <i class="fas fa-chevron-down text-sm"></i>
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 hidden group-hover:block">
                            <a href="perfil.html" class="block px-4 py-2 text-gray-800 hover:bg-indigo-50">Mi Perfil</a>
                            <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-indigo-50">Configuración</a>
                            <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-indigo-50">Cerrar Sesión</a>
                        </div>
                    </div>
                    <button class="md:hidden text-white" id="mobileMenuBtn">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden bg-indigo-800 md:hidden">
            <div class="container mx-auto px-4 py-2 flex flex-col space-y-3">
                <a href="#" class="text-white py-2 hover:bg-indigo-700 px-2 rounded">Inicio</a>
                <a href="#rifas" class="text-white py-2 hover:bg-indigo-700 px-2 rounded">Rifas</a>
                <a href="#ganadores" class="text-white py-2 hover:bg-indigo-700 px-2 rounded">Ganadores</a>
                <a href="#reglas" class="text-white py-2 hover:bg-indigo-700 px-2 rounded">Reglas</a>
                <a href="perfil.html" class="text-white py-2 hover:bg-indigo-700 px-2 rounded">Mi Perfil</a>
                <a href="#" class="text-white py-2 hover:bg-indigo-700 px-2 rounded">Cerrar Sesión</a>
            </div>
        </div>
    </header>

    <!-- Profile Section -->
    <section class="py-8 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-start">
                <!-- Profile Sidebar -->
                <div class="md:w-1/4 mb-8 md:mb-0 md:pr-8">
                    <div class="bg-white rounded-lg shadow-sm p-6 sticky top-4">
                        <div class="flex flex-col items-center mb-6">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Usuario" class="w-24 h-24 rounded-full mb-4">
                            <h2 class="text-xl font-bold text-gray-800">María González</h2>
                            <p class="text-gray-600">Usuario desde: Junio 2023</p>
                        </div>

                        <div class="mb-6">
                            <h3 class="font-bold text-gray-800 mb-2">Información de contacto</h3>
                            <p class="text-gray-600 mb-1"><i class="fas fa-envelope mr-2 text-indigo-600"></i> maria.gonzalez@example.com</p>
                            <p class="text-gray-600"><i class="fas fa-phone mr-2 text-indigo-600"></i> +58 412-5551234</p>
                        </div>

                        <div class="mb-6">
                            <h3 class="font-bold text-gray-800 mb-2">Estadísticas</h3>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Rifas participadas:</span>
                                <span class="font-bold">12</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Boletos comprados:</span>
                                <span class="font-bold">47</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Premios ganados:</span>
                                <span class="font-bold">2</span>
                            </div>
                        </div>

                        <button class="w-full bg-indigo-600 text-white py-2 rounded-lg font-medium hover:bg-indigo-700 transition">
                            <i class="fas fa-cog mr-2"></i> Editar Perfil
                        </button>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="md:w-3/4 w-full">
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                        <!-- Tabs Navigation -->
                        <div class="border-b border-gray-200">
                            <div class="flex overflow-x-auto">
                                <button id="activitiesTab" class="tab-button active px-6 py-4 font-medium text-gray-800">
                                    Mis Actividades
                                </button>
                                <button id="rafflesTab" class="tab-button px-6 py-4 font-medium text-gray-500">
                                    Mis Rifas
                                </button>
                                <button id="ticketsTab" class="tab-button px-6 py-4 font-medium text-gray-500">
                                    Mis Boletos
                                </button>
                                <button id="winningsTab" class="tab-button px-6 py-4 font-medium text-gray-500">
                                    Mis Premios
                                </button>
                            </div>
                        </div>

                        <!-- Tab Content -->
                        <div class="p-6">
                            <!-- Activities Tab Content -->
                            <div id="activitiesContent" class="tab-content">
                                <h2 class="text-2xl font-bold text-gray-800 mb-6">Historial de Actividades</h2>

                                <div class="space-y-6">
                                    <!-- Activity Item -->
                                    <div class="activity-item">
                                        <div class="activity-dot"></div>
                                        <div class="bg-gray-50 rounded-lg p-4">
                                            <div class="flex justify-between items-start mb-2">
                                                <h3 class="font-bold text-gray-800">Compra de boletos confirmada</h3>
                                                <span class="text-sm text-gray-500">Hoy, 10:45 AM</span>
                                            </div>
                                            <p class="text-gray-600 mb-2">Has comprado 3 boletos para la rifa "iPhone 14 Pro Max 256GB".</p>
                                            <div class="flex flex-wrap gap-2">
                                                <span class="ticket-number px-3 py-1 rounded-full">#247</span>
                                                <span class="ticket-number px-3 py-1 rounded-full">#312</span>
                                                <span class="ticket-number px-3 py-1 rounded-full">#589</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Activity Item -->
                                    <div class="activity-item">
                                        <div class="activity-dot"></div>
                                        <div class="bg-gray-50 rounded-lg p-4">
                                            <div class="flex justify-between items-start mb-2">
                                                <h3 class="font-bold text-gray-800">¡Felicidades! Has ganado</h3>
                                                <span class="text-sm text-gray-500">Ayer, 4:30 PM</span>
                                            </div>
                                            <p class="text-gray-600 mb-2">Tu boleto #112 ha sido seleccionado como ganador en la rifa "Smartwatch Premium".</p>
                                            <div class="flex items-center">
                                                <span class="won-badge px-3 py-1 rounded-full text-sm font-medium">Ganador</span>
                                                <a href="#" class="ml-4 text-indigo-600 font-medium hover:text-indigo-800">Ver detalles del premio</a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Activity Item -->
                                    <div class="activity-item">
                                        <div class="activity-dot"></div>
                                        <div class="bg-gray-50 rounded-lg p-4">
                                            <div class="flex justify-between items-start mb-2">
                                                <h3 class="font-bold text-gray-800">Resultado de rifa</h3>
                                                <span class="text-sm text-gray-500">15 Ago, 2023</span>
                                            </div>
                                            <p class="text-gray-600 mb-2">El sorteo de la rifa "Zapatos Deportivos Premium" ha finalizado.</p>
                                            <div class="flex items-center">
                                                <span class="lost-badge px-3 py-1 rounded-full text-sm font-medium">No ganaste</span>
                                                <a href="#" class="ml-4 text-indigo-600 font-medium hover:text-indigo-800">Ver ganador</a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Activity Item -->
                                    <div class="activity-item">
                                        <div class="activity-dot"></div>
                                        <div class="bg-gray-50 rounded-lg p-4">
                                            <div class="flex justify-between items-start mb-2">
                                                <h3 class="font-bold text-gray-800">Compra de boletos confirmada</h3>
                                                <span class="text-sm text-gray-500">10 Ago, 2023</span>
                                            </div>
                                            <p class="text-gray-600 mb-2">Has comprado 5 boletos para la rifa "Reloj de Lujo Automático".</p>
                                            <div class="flex flex-wrap gap-2">
                                                <span class="ticket-number px-3 py-1 rounded-full">#023</span>
                                                <span class="ticket-number px-3 py-1 rounded-full">#145</span>
                                                <span class="ticket-number px-3 py-1 rounded-full">#267</span>
                                                <span class="ticket-number px-3 py-1 rounded-full">#389</span>
                                                <span class="ticket-number px-3 py-1 rounded-full">#412</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Activity Item -->
                                    <div class="activity-item">
                                        <div class="activity-dot"></div>
                                        <div class="bg-gray-50 rounded-lg p-4">
                                            <div class="flex justify-between items-start mb-2">
                                                <h3 class="font-bold text-gray-800">Premio entregado</h3>
                                                <span class="text-sm text-gray-500">5 Ago, 2023</span>
                                            </div>
                                            <p class="text-gray-600 mb-2">Tu premio "Laptop Gamer" ha sido entregado satisfactoriamente.</p>
                                            <div class="flex items-center">
                                                <span class="won-badge px-3 py-1 rounded-full text-sm font-medium">Entregado</span>
                                                <a href="#" class="ml-4 text-indigo-600 font-medium hover:text-indigo-800">Dejar reseña</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-6 text-center">
                                    <button class="bg-indigo-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-indigo-700 transition">
                                        Cargar más actividades
                                    </button>
                                </div>
                            </div>

                            <!-- Raffles Tab Content -->
                            <div id="rafflesContent" class="tab-content hidden">
                                <h2 class="text-2xl font-bold text-gray-800 mb-6">Rifas en las que he participado</h2>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Raffle Card 1 (Active) -->
                                    <div class="raffle-card bg-white rounded-xl overflow-hidden border border-gray-200">
                                        <div class="relative h-40 overflow-hidden">
                                            <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
                                                alt="iPhone 14 Pro Max" class="w-full h-full object-cover">
                                            <div class="absolute top-4 right-4 bg-indigo-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                                                Activa
                                            </div>
                                        </div>
                                        <div class="p-4">
                                            <h3 class="text-lg font-bold text-gray-800 mb-2">iPhone 14 Pro Max 256GB</h3>
                                            <div class="flex justify-between items-center mb-3">
                                                <div>
                                                    <span class="text-gray-500 text-sm">Boletos:</span>
                                                    <span class="text-indigo-600 font-bold ml-2">3</span>
                                                </div>
                                                <div>
                                                    <span class="text-gray-500 text-sm">Invertido:</span>
                                                    <span class="text-gray-800 font-bold ml-2">$15</span>
                                                </div>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <div>
                                                    <span class="text-gray-500 text-sm">Sorteo:</span>
                                                    <span class="text-gray-800 font-medium ml-2">30 Sep, 2023</span>
                                                </div>
                                                <a href="#" class="text-indigo-600 font-medium hover:text-indigo-800 transition">
                                                    Ver <i class="fas fa-arrow-right ml-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Raffle Card 2 (Won) -->
                                    <div class="raffle-card bg-white rounded-xl overflow-hidden border border-gray-200">
                                        <div class="relative h-40 overflow-hidden">
                                            <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
                                                alt="Reloj de lujo" class="w-full h-full object-cover">
                                            <div class="absolute top-4 right-4 bg-green-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                                                Ganada
                                            </div>
                                        </div>
                                        <div class="p-4">
                                            <h3 class="text-lg font-bold text-gray-800 mb-2">Reloj de Lujo Automático</h3>
                                            <div class="flex justify-between items-center mb-3">
                                                <div>
                                                    <span class="text-gray-500 text-sm">Boletos:</span>
                                                    <span class="text-indigo-600 font-bold ml-2">5</span>
                                                </div>
                                                <div>
                                                    <span class="text-gray-500 text-sm">Invertido:</span>
                                                    <span class="text-gray-800 font-bold ml-2">$20</span>
                                                </div>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <div>
                                                    <span class="text-gray-500 text-sm">Sorteo:</span>
                                                    <span class="text-gray-800 font-medium ml-2">15 Ago, 2023</span>
                                                </div>
                                                <a href="#" class="text-indigo-600 font-medium hover:text-indigo-800 transition">
                                                    Ver premio <i class="fas fa-trophy ml-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Raffle Card 3 (Lost) -->
                                    <div class="raffle-card bg-white rounded-xl overflow-hidden border border-gray-200">
                                        <div class="relative h-40 overflow-hidden">
                                            <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
                                                alt="Zapatos deportivos" class="w-full h-full object-cover">
                                            <div class="absolute top-4 right-4 bg-red-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                                                No ganó
                                            </div>
                                        </div>
                                        <div class="p-4">
                                            <h3 class="text-lg font-bold text-gray-800 mb-2">Zapatos Deportivos Premium</h3>
                                            <div class="flex justify-between items-center mb-3">
                                                <div>
                                                    <span class="text-gray-500 text-sm">Boletos:</span>
                                                    <span class="text-indigo-600 font-bold ml-2">2</span>
                                                </div>
                                                <div>
                                                    <span class="text-gray-500 text-sm">Invertido:</span>
                                                    <span class="text-gray-800 font-bold ml-2">$6</span>
                                                </div>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <div>
                                                    <span class="text-gray-500 text-sm">Sorteo:</span>
                                                    <span class="text-gray-800 font-medium ml-2">5 Jul, 2023</span>
                                                </div>
                                                <a href="#" class="text-indigo-600 font-medium hover:text-indigo-800 transition">
                                                    Ver ganador <i class="fas fa-user ml-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Raffle Card 4 (Pending) -->
                                    <div class="raffle-card bg-white rounded-xl overflow-hidden border border-gray-200">
                                        <div class="relative h-40 overflow-hidden">
                                            <img src="https://images.unsplash.com/photo-1505740420928-5e880c94d7c0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
                                                alt="Audífonos premium" class="w-full h-full object-cover">
                                            <div class="absolute top-4 right-4 bg-yellow-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                                                Pendiente
                                            </div>
                                        </div>
                                        <div class="p-4">
                                            <h3 class="text-lg font-bold text-gray-800 mb-2">Audífonos Premium Noise Cancelling</h3>
                                            <div class="flex justify-between items-center mb-3">
                                                <div>
                                                    <span class="text-gray-500 text-sm">Boletos:</span>
                                                    <span class="text-indigo-600 font-bold ml-2">4</span>
                                                </div>
                                                <div>
                                                    <span class="text-gray-500 text-sm">Invertido:</span>
                                                    <span class="text-gray-800 font-bold ml-2">$16</span>
                                                </div>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <div>
                                                    <span class="text-gray-500 text-sm">Sorteo:</span>
                                                    <span class="text-gray-800 font-medium ml-2">10 Oct, 2023</span>
                                                </div>
                                                <a href="#" class="text-indigo-600 font-medium hover:text-indigo-800 transition">
                                                    Ver <i class="fas fa-arrow-right ml-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-6 text-center">
                                    <button class="bg-indigo-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-indigo-700 transition">
                                        Cargar más rifas
                                    </button>
                                </div>
                            </div>

                            <!-- Tickets Tab Content -->
                            <div id="ticketsContent" class="tab-content hidden">
                                <h2 class="text-2xl font-bold text-gray-800 mb-6">Mis Boletos</h2>

                                <div class="mb-6">
                                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                        <div class="mb-4 md:mb-0">
                                            <label for="filterRaffle" class="block text-sm font-medium text-gray-700 mb-1">Filtrar por rifa:</label>
                                            <select id="filterRaffle" class="w-full md:w-64 px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                                                <option value="all">Todas las rifas</option>
                                                <option value="active">Rifas activas</option>
                                                <option value="won">Rifas ganadas</option>
                                                <option value="lost">Rifas no ganadas</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="searchTicket" class="block text-sm font-medium text-gray-700 mb-1">Buscar boleto:</label>
                                            <div class="relative">
                                                <input type="text" id="searchTicket" placeholder="Número de boleto..." class="w-full md:w-64 px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                                                <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Número</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rifa</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha compra</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">#247</td>
                                                <td class="px-6 py-4 whitespace-nowrap">iPhone 14 Pro Max 256GB</td>
                                                <td class="px-6 py-4 whitespace-nowrap">20 Sep, 2023</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">Activo</span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">#112</td>
                                                <td class="px-6 py-4 whitespace-nowrap">Smartwatch Premium</td>
                                                <td class="px-6 py-4 whitespace-nowrap">15 Ago, 2023</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Ganador</span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Ver premio</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">#589</td>
                                                <td class="px-6 py-4 whitespace-nowrap">Zapatos Deportivos Premium</td>
                                                <td class="px-6 py-4 whitespace-nowrap">5 Jul, 2023</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800">No ganó</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Ver ganador</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">#023</td>
                                                <td class="px-6 py-4 whitespace-nowrap">Reloj de Lujo Automático</td>
                                                <td class="px-6 py-4 whitespace-nowrap">10 Ago, 2023</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">Pendiente</span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="mt-6 flex justify-between items-center">
                                    <div class="text-sm text-gray-500">
                                        Mostrando <span class="font-medium">1</span> a <span class="font-medium">4</span> de <span class="font-medium">47</span> boletos
                                    </div>
                                    <div class="flex space-x-2">
                                        <button class="px-3 py-1 border border-gray-300 rounded-md bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                            Anterior
                                        </button>
                                        <button class="px-3 py-1 border border-indigo-600 rounded-md bg-indigo-600 text-sm font-medium text-white">
                                            1
                                        </button>
                                        <button class="px-3 py-1 border border-gray-300 rounded-md bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                            2
                                        </button>
                                        <button class="px-3 py-1 border border-gray-300 rounded-md bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                            Siguiente
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Winnings Tab Content -->
                            <div id="winningsContent" class="tab-content hidden">
                                <h2 class="text-2xl font-bold text-gray-800 mb-6">Mis Premios Ganados</h2>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Winning 1 -->
                                    <div class="raffle-card bg-white rounded-xl overflow-hidden border border-gray-200">
                                        <div class="relative h-40 overflow-hidden">
                                            <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
                                                alt="Reloj de lujo" class="w-full h-full object-cover">
                                            <div class="absolute top-4 right-4 bg-green-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                                                Entregado
                                            </div>
                                        </div>
                                        <div class="p-4">
                                            <h3 class="text-lg font-bold text-gray-800 mb-2">Reloj de Lujo Automático</h3>
                                            <div class="mb-3">
                                                <p class="text-gray-600 mb-1"><span class="font-medium">Boleto ganador:</span> #112</p>
                                                <p class="text-gray-600 mb-1"><span class="font-medium">Fecha de sorteo:</span> 15 Ago, 2023</p>
                                                <p class="text-gray-600"><span class="font-medium">Fecha de entrega:</span> 20 Ago, 2023</p>
                                            </div>
                                            <button class="w-full bg-indigo-600 text-white py-2 rounded-lg font-medium hover:bg-indigo-700 transition">
                                                Ver detalles del premio
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Winning 2 -->
                                    <div class="raffle-card bg-white rounded-xl overflow-hidden border border-gray-200">
                                        <div class="relative h-40 overflow-hidden">
                                            <img src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
                                                alt="Laptop gamer" class="w-full h-full object-cover">
                                            <div class="absolute top-4 right-4 bg-green-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                                                Entregado
                                            </div>
                                        </div>
                                        <div class="p-4">
                                            <h3 class="text-lg font-bold text-gray-800 mb-2">Laptop Gamer</h3>
                                            <div class="mb-3">
                                                <p class="text-gray-600 mb-1"><span class="font-medium">Boleto ganador:</span> #456</p>
                                                <p class="text-gray-600 mb-1"><span class="font-medium">Fecha de sorteo:</span> 5 Jul, 2023</p>
                                                <p class="text-gray-600"><span class="font-medium">Fecha de entrega:</span> 10 Jul, 2023</p>
                                            </div>
                                            <button class="w-full bg-indigo-600 text-white py-2 rounded-lg font-medium hover:bg-indigo-700 transition">
                                                Ver detalles del premio
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Winning 3 (Pending) -->
                                    <div class="raffle-card bg-white rounded-xl overflow-hidden border border-gray-200">
                                        <div class="relative h-40 overflow-hidden">
                                            <img src="https://images.unsplash.com/photo-1505740420928-5e880c94d7c0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
                                                alt="Audífonos premium" class="w-full h-full object-cover">
                                            <div class="absolute top-4 right-4 bg-yellow-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                                                Pendiente
                                            </div>
                                        </div>
                                        <div class="p-4">
                                            <h3 class="text-lg font-bold text-gray-800 mb-2">Audífonos Premium</h3>
                                            <div class="mb-3">
                                                <p class="text-gray-600 mb-1"><span class="font-medium">Boleto ganador:</span> #789</p>
                                                <p class="text-gray-600 mb-1"><span class="font-medium">Fecha de sorteo:</span> 10 Oct, 2023</p>
                                                <p class="text-gray-600"><span class="font-medium">Estado:</span> En proceso de entrega</p>
                                            </div>
                                            <button class="w-full bg-indigo-600 text-white py-2 rounded-lg font-medium hover:bg-indigo-700 transition">
                                                Ver detalles del premio
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-6 text-center">
                                    <button class="bg-indigo-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-indigo-700 transition">
                                        Cargar más premios
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">Rifa Facil</h3>
                    <p class="text-gray-400">La plataforma más fácil y segura para participar en rifas online en Venezuela.</p>
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
                        <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-indigo-600 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-400 transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-pink-600 transition">
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

    <script>
        // Mobile menu toggle
        document.getElementById('mobileMenuBtn').addEventListener('click', function () {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        });

        // Tab functionality
        const tabs = {
            activitiesTab: document.getElementById('activitiesTab'),
            rafflesTab: document.getElementById('rafflesTab'),
            ticketsTab: document.getElementById('ticketsTab'),
            winningsTab: document.getElementById('winningsTab'),
            activitiesContent: document.getElementById('activitiesContent'),
            rafflesContent: document.getElementById('rafflesContent'),
            ticketsContent: document.getElementById('ticketsContent'),
            winningsContent: document.getElementById('winningsContent')
        };

        function resetTabs() {
            // Remove active class from all tabs
            Object.keys(tabs).forEach(key => {
                if (key.endsWith('Tab')) {
                    tabs[key].classList.remove('active');
                    tabs[key].classList.add('text-gray-500');
                    tabs[key].classList.remove('text-gray-800');
                }
            });

            // Hide all content
            Object.keys(tabs).forEach(key => {
                if (key.endsWith('Content')) {
                    tabs[key].classList.add('hidden');
                }
            });
        }

        function activateTab(tabName) {
            resetTabs();

            // Activate selected tab
            tabs[tabName].classList.add('active');
            tabs[tabName].classList.remove('text-gray-500');
            tabs[tabName].classList.add('text-gray-800');

            // Show corresponding content
            const contentName = tabName.replace('Tab', 'Content');
            tabs[contentName].classList.remove('hidden');
        }

        // Add event listeners to tabs
        tabs.activitiesTab.addEventListener('click', () => activateTab('activitiesTab'));
        tabs.rafflesTab.addEventListener('click', () => activateTab('rafflesTab'));
        tabs.ticketsTab.addEventListener('click', () => activateTab('ticketsTab'));
        tabs.winningsTab.addEventListener('click', () => activateTab('winningsTab'));

        // Initialize with activities tab active
        activateTab('activitiesTab');

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>

</html>
