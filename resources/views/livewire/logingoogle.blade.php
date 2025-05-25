<div>
    @if(auth()->check() && auth()->user()->google_id)
                <div class="flex items-center space-x-4">
                    <div class="relative group">
                        <button class="flex items-center space-x-2">
                            <img src="{{auth()->user()->imagen_perfil}}" alt="Usuario" class="w-8 h-8 rounded-full">
                            <span class="font-medium">{{auth()->user()->nombre}}</span>
                            <i class="fas fa-chevron-down text-sm"></i>
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 hidden group-hover:block">
                            <a href="perfil.html" class="block px-4 py-2 text-gray-800 hover:bg-indigo-50">Mi Perfil</a>
                            <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-indigo-50">Configuración</a>
                            <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-gray-800 hover:bg-indigo-50">Cerrar Sesión</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf  </form>

                        </div>
                    </div>
                    <button class="md:hidden text-white" id="mobileMenuBtn">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>

                @else

                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}"
                   
                        class="bg-white text-indigo-600 px-4 py-2 rounded-lg font-medium hover:bg-indigo-50 transition">
                        <i class="fab fa-google mr-3"></i> Iniciar con Google
                   
                </a>
                    <button class="md:hidden text-white" id="mobileMenuBtn">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>



                @endif





<!-- Login Modal -->
<div id="loginModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4 {{ $modalvisible ? '' : 'hidden' }}">
    <div class="bg-white rounded-xl max-w-md w-full">
        <div class="p-6">
            <div class="flex justify-between items-start mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Iniciar Sesión</h2>
                <button
                wire:click="closelogin"
                class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="mb-4">
                <a href="{{ route('login') }}"
                    class="w-full bg-red-500 text-white px-4 py-3 rounded-lg font-bold hover:bg-red-600 transition flex items-center justify-center">
                    <i class="fab fa-google mr-3"></i> Continuar con Google
            </a>
            </div>

        </div>
    </div>
</div>















</div>
