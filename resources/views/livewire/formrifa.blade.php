<!-- Raffle Details Modal -->
<div id="raffleModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4 {{$modal?'':'hidden'}}">
    <div class="bg-white rounded-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div class="p-6">
            <div class="flex justify-between items-start mb-6">
                <h2 class="text-2xl font-bold text-gray-800" id="raffleTitle">iPhone 14 Pro Max 256GB</h2>
                <button
                wire:click="closemodal"
                 class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>




            <div class="mb-6">
                <img id="raffleImage"
                    src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
                    alt="Raffle image" class="w-full h-64 object-cover rounded-lg">
            </div>

            <div class="mb-6">
                <h3 class="text-lg font-bold text-gray-800 mb-2">Descripción</h3>
                <p id="raffleDescription" class="text-gray-600">
                    Participa por este smartphone de última generación con cámara profesional, pantalla Super Retina
                    XDR y chip A16 Bionic. Incluye todos los accesorios originales y garantía de 1 año.
                </p>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-6">
                <div>
                    <p class="text-gray-500 text-sm">Precio por boleto:</p>
                    <p id="rafflePrice" class="text-indigo-600 font-bold">$5</p>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">Fecha de sorteo:</p>
                    <p id="raffleDate" class="text-gray-800 font-medium">15 de Agosto, 2023</p>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">Boletos disponibles:</p>
                    <p id="raffleAvailable" class="text-gray-800 font-medium">247/900</p>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">Estado:</p>
                    <p class="text-green-600 font-medium">Activa</p>
                </div>
            </div>

            <div id="loginRequired" class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-6">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-circle text-yellow-400"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-yellow-700">
                            Debes <a href="{{ route('login') }}" class="font-medium text-yellow-700 underline hover:text-yellow-600">iniciar sesión</a> y completar tu perfil para participar
                            en esta rifa.
                        </p>
                    </div>
                </div>
            </div>

            <div id="participationForm" class="hidden">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Participar en esta rifa</h3>

                <div class="mb-4">
                    <label for="ticketQuantity" class="block text-sm font-medium text-gray-700 mb-1">Cantidad de
                        boletos</label>
                    <select id="ticketQuantity"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="1">1 boleto</option>
                        <option value="3">3 boletos</option>
                        <option value="5">5 boletos</option>
                        <option value="10">10 boletos</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Método de pago</label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        <div class="payment-method p-4 rounded-lg cursor-pointer"
                            onclick="selectPaymentMethod('pagoMovil')">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                    <i class="fas fa-mobile-alt text-blue-600"></i>
                                </div>
                                <span class="font-medium">Pago Móvil</span>
                            </div>
                        </div>

                        <div class="payment-method p-4 rounded-lg cursor-pointer"
                            onclick="selectPaymentMethod('cripto')">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                                    <i class="fab fa-bitcoin text-purple-600"></i>
                                </div>
                                <span class="font-medium">Criptomoneda</span>
                            </div>
                        </div>

                        <div class="payment-method p-4 rounded-lg cursor-pointer"
                            onclick="selectPaymentMethod('zinli')">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3">
                                    <i class="fas fa-wallet text-green-600"></i>
                                </div>
                                <span class="font-medium">Zinli</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="paymentDetails" class="hidden mb-6">
                    <h4 class="text-md font-bold text-gray-800 mb-3">Detalles del pago</h4>

                    <div id="pagoMovilDetails" class="bg-blue-50 p-4 rounded-lg hidden">
                        <div class="mb-3">
                            <p class="text-sm text-gray-600 mb-1">Realiza tu transferencia a:</p>
                            <p class="font-bold text-blue-700">0412-1234567</p>
                            <p class="text-sm text-gray-600">Banco: Banco de Venezuela</p>
                            <p class="text-sm text-gray-600">C.I.: V-12345678</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Monto total:</p>
                            <p class="font-bold text-blue-700">$15.00</p>
                        </div>
                    </div>

                    <div id="criptoDetails" class="bg-purple-50 p-4 rounded-lg hidden">
                        <div class="mb-3">
                            <p class="text-sm text-gray-600 mb-1">Envía USDT (TRC20) a:</p>
                            <p class="font-mono text-purple-700 break-all">TXYZ1234567890abcdefghijklmnopqrstuvw</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Monto total:</p>
                            <p class="font-bold text-purple-700">15.00 USDT</p>
                        </div>
                    </div>

                    <div id="zinliDetails" class="bg-green-50 p-4 rounded-lg hidden">
                        <div class="mb-3">
                            <p class="text-sm text-gray-600 mb-1">Envía el dinero a:</p>
                            <p class="font-bold text-green-700">rifafacil@example.com</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Monto total:</p>
                            <p class="font-bold text-green-700">$15.00</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <label for="paymentReference" class="block text-sm font-medium text-gray-700 mb-1">Referencia de
                            pago</label>
                        <input type="text" id="paymentReference"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Número de referencia, hash de transacción, etc.">
                    </div>
                </div>

                <div id="ticketNumbers" class=" mb-6">
                    <h4 class="text-md font-bold text-gray-800 mb-3">Tus números asignados</h4>
                    <div class="flex flex-wrap gap-2">
                        <span class="ticket-number px-3 py-1 rounded-full">#123</span>
                        <span class="ticket-number px-3 py-1 rounded-full">#456</span>
                        <span class="ticket-number px-3 py-1 rounded-full">#789</span>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button id="confirmPurchaseBtn"
                        class="bg-indigo-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-indigo-700 transition">
                        Confirmar Compra <i class="fas fa-check ml-1"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
