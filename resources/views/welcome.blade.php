 @extends('layouts.app')

@section('content')
   <!-- Hero Section -->
<section class="gradient-bg text-white py-16">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-8 md:mb-0">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Participa y gana increíbles premios</h2>
                <p class="text-xl mb-6">La plataforma más fácil y segura para participar en rifas online en
                    Venezuela.</p>
                <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4">
                    <a href="#rifas"
                        class="bg-white text-indigo-600 px-6 py-3 rounded-lg font-bold text-center hover:bg-indigo-50 transition">
                        Ver Rifas Disponibles
                    </a>
                    <a href="#reglas"
                        class="bg-indigo-700 text-white px-6 py-3 rounded-lg font-bold text-center hover:bg-indigo-600 transition">
                        Cómo Participar
                    </a>
                </div>
            </div>
            <div class="md:w-1/2 flex justify-center">
                <div class="relative">
                    <div
                        class="w-64 h-64 md:w-80 md:h-80 bg-indigo-400 rounded-full opacity-20 absolute -top-10 -left-10">
                    </div>
                    <div
                        class="w-64 h-64 md:w-80 md:h-80 bg-indigo-300 rounded-full opacity-20 absolute -bottom-10 -right-10">
                    </div>
                    <img src="
                    {{ asset('img/img1.png') }}"
                        alt="Premios de rifas"
                       alt="Premios de rifas"
                        class="relative z-10 w-74 h-64 md:w-90 md:h-80 object-cover rounded-xl shadow-xl">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Raffles -->
<section id="rifas" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Rifas Disponibles</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Participa en nuestras rifas activas y gana increíbles
                premios. Selecciona una rifa para ver más detalles.</p>
        </div>

{{-- rifas --}}

            @livewire('rifas')

{{--
fin rifas --}}





</section>

<!-- How It Works -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">¿Cómo Funciona?</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Participar en nuestras rifas es muy sencillo. Sigue estos
                pasos:</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-xl shadow-sm text-center">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user text-indigo-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">1. Regístrate</h3>
                <p class="text-gray-600">Crea tu cuenta usando tu correo de Google y completa tu perfil.</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm text-center">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-ticket-alt text-indigo-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">2. Compra Boletos</h3>
                <p class="text-gray-600">Selecciona la rifa que prefieras y compra los boletos que desees.</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm text-center">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-trophy text-indigo-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">3. ¡Gana Premios!</h3>
                <p class="text-gray-600">Si tu número es seleccionado, te contactaremos para entregarte tu premio.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Winners Section -->
<section id="ganadores" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Últimos Ganadores</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Estos son algunos de nuestros afortunados ganadores
                recientes.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Winner 1 -->
            <div class="bg-gray-50 rounded-xl p-6 flex items-center">
                <div class="w-16 h-16 rounded-full overflow-hidden mr-4">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Ganadora"
                        class="w-full h-full object-cover">
                </div>
                <div>
                    <h3 class="font-bold text-gray-800">María G.</h3>
                    <p class="text-gray-600 text-sm">Ganó: iPhone 13 Pro</p>
                    <p class="text-indigo-600 text-sm font-medium">Número: #247</p>
                </div>
            </div>

            <!-- Winner 2 -->
            <div class="bg-gray-50 rounded-xl p-6 flex items-center">
                <div class="w-16 h-16 rounded-full overflow-hidden mr-4">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Ganador"
                        class="w-full h-full object-cover">
                </div>
                <div>
                    <h3 class="font-bold text-gray-800">Carlos R.</h3>
                    <p class="text-gray-600 text-sm">Ganó: Laptop Gamer</p>
                    <p class="text-indigo-600 text-sm font-medium">Número: #589</p>
                </div>
            </div>

            <!-- Winner 3 -->
            <div class="bg-gray-50 rounded-xl p-6 flex items-center">
                <div class="w-16 h-16 rounded-full overflow-hidden mr-4">
                    <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Ganadora"
                        class="w-full h-full object-cover">
                </div>
                <div>
                    <h3 class="font-bold text-gray-800">Ana L.</h3>
                    <p class="text-gray-600 text-sm">Ganó: Smartwatch Premium</p>
                    <p class="text-indigo-600 text-sm font-medium">Número: #112</p>
                </div>
            </div>
        </div>

        <div class="text-center mt-10">
            <button class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-indigo-700 transition">
                Ver Todos los Ganadores <i class="fas fa-list ml-2"></i>
            </button>
        </div>
    </div>
</section>

<!-- Rules Section -->
<section id="reglas" class="py-16 bg-gray-50">

    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Reglas de Participación</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Conoce los términos y condiciones para participar en nuestras
                rifas.</p>
        </div>

        <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-sm p-8">
            <div class="mb-6">
                <h3 class="text-xl font-bold text-gray-800 mb-3">1. Requisitos para Participar</h3>
                <ul class="list-disc pl-5 text-gray-600 space-y-2">
                    <li>Debes ser mayor de 18 años.</li>
                    <li>Necesitas una cuenta válida en Rifa Facil con tu perfil completo.</li>
                    <li>Debes residir en Venezuela para poder recibir los premios.</li>
                </ul>
            </div>

            <div class="mb-6">
                <h3 class="text-xl font-bold text-gray-800 mb-3">2. Proceso de Compra</h3>
                <ul class="list-disc pl-5 text-gray-600 space-y-2">
                    <li>Selecciona la rifa en la que deseas participar.</li>
                    <li>Elige la cantidad de boletos que deseas comprar.</li>
                    <li>Selecciona tu método de pago preferido.</li>
                    <li>Realiza el pago según las instrucciones proporcionadas.</li>
                    <li>Registra tu compra en nuestra plataforma con los datos de tu transacción.</li>
                </ul>
            </div>

            <div class="mb-6">
                <h3 class="text-xl font-bold text-gray-800 mb-3">3. Sorteo y Entrega</h3>
                <ul class="list-disc pl-5 text-gray-600 space-y-2">
                    <li>El sorteo se realizará en la fecha indicada para cada rifa.</li>
                    <li>El ganador será seleccionado aleatoriamente entre todos los boletos vendidos.</li>
                    <li>Nos comunicaremos con el ganador a través de los datos de contacto proporcionados.</li>
                    <li>El premio será entregado en un plazo máximo de 15 días hábiles después de confirmado el
                        ganador.</li>
                </ul>
            </div>

            <div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">4. Políticas Generales</h3>
                <ul class="list-disc pl-5 text-gray-600 space-y-2">
                    <li>Los boletos no son reembolsables.</li>
                    <li>Rifa Facil se reserva el derecho de cancelar o modificar cualquier rifa, garantizando
                        siempre la transparencia del proceso.</li>
                    <li>Cualquier situación no contemplada será resuelta por el equipo de Rifa Facil.</li>
                </ul>
            </div>
        </div>
    </div>
</section>
@livewire('form-confirm-user')

@endsection
