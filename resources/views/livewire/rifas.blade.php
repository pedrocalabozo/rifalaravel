
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    <!-- Raffle Card 1 -->

@foreach ($raffles as $rifa)
<div wire:click="open_detalle_rifa({{$rifa->id}})" class="raffle-card bg-white rounded-xl overflow-hidden">
    <div class="relative h-48 overflow-hidden">
        <img src="{{ $rifa->foto_url ?? '/img/default-image.jpg' }}"
            alt="Imagen de la rifa" class="w-full h-full object-cover">
        <div class="absolute top-4 right-4 bg-indigo-600 text-white px-3 py-1 rounded-full text-sm font-medium">
            {{$rifa->estado}}
        </div>
    </div>
    <div class="p-6">
        <h3 class="text-xl font-bold text-gray-800 mb-2">{{$rifa->titulo}}</h3>
        <p class="text-gray-600 mb-4">{{$rifa->descripcion}}</p>
        <div class="flex justify-between items-center">
            <div>
                <span class="text-gray-500 text-sm">Precio por boleto:</span>
                <span class="text-indigo-600 font-bold ml-2">${{$rifa->precio_boleto}}</span>
            </div>
            <a 
               class="participar-link text-indigo-600 font-medium hover:text-indigo-800 transition"
               >
                Participar<i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
    </div>
</div>













@endforeach
<div class="text-center mt-10">
    <button class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-indigo-700 transition">
        Ver Todas las Rifas <i class="fas fa-arrow-down ml-2"></i>
    </button>
</div>







{{$detalle_rifa}}

@if($detalle_rifa)


<!-- Raffle Details Modal -->
<div  class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div class="p-6">
            <div class="flex justify-between items-start mb-6">
                <h2 class="text-2xl font-bold text-gray-800" >{{$data_rifa->titulo}}</h2>
                <button
                wire:click="closemodal"
                 class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>




            <div class="mb-6">
                <img id="raffleImage"
                    src="{{ $data_rifa->foto_url ?? '/img/default-image.jpg' }}"
                    alt="Raffle image" class="w-full h-64 object-cover rounded-lg">
            </div>

            <div class="mb-6">
                <h3 class="text-lg font-bold text-gray-800 mb-2">Descripción</h3>
                <p id="raffleDescription" class="text-gray-600">
                    {{$data_rifa->descripcion}} </p>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-6">
                <div>
                    <p class="text-gray-500 text-sm">Precio por boleto:</p>
                    <p id="rafflePrice" class="text-indigo-600 font-bold"> {{$data_rifa->precio_boleto}}</p>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">Fecha de sorteo:</p>
                    <p id="raffleDate" class="text-gray-800 font-medium">{{ \Carbon\Carbon::parse($data_rifa->fecha_fin)->format('d M Y, H:i') }} </p>
                </div>
                {{-- <div>
                    <p class="text-gray-500 text-sm">Boletos disponibles:</p>
                    <p id="raffleAvailable" class="text-gray-800 font-medium"> {{$data_rifa->precio_boleto}}</p>
                </div> --}}
                <div>
                    <p class="text-gray-500 text-sm">Estado:</p>
                    <p class="text-green-600 font-medium"> {{$data_rifa->estado}}</p>
                </div>
            </div>



            @if($auth_full)


            <div id="" >
                <h3 class="text-lg font-bold text-gray-800 mb-4">Participar en esta rifa</h3>







                        <div>
                            <!-- Selección de la cantidad de boletos -->
                            <div class="mb-4">
                                <label for="ticketQuantity" class="block text-sm font-medium text-gray-700 mb-1">
                                    Cantidad de boletos
                                </label>
                                <!-- Se utiliza wire:model para enlazar la selección con la propiedad $ticketQuantity -->
                                <select id="ticketQuantity"  wire:change="handleQuantityChange($event.target.value)" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="1">1 boleto</option>
                                    <option value="3">3 boletos</option>
                                    <option value="5">5 boletos</option>
                                    <option value="10">10 boletos</option>
                                </select>
                            </div>





                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Método de pago {{$metodo_pago}}</label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        <div class="payment-method p-4 rounded-lg cursor-pointer"
                           wire:click="select_metodo('pagoMovil')">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                    <i class="fas fa-mobile-alt text-blue-600"></i>
                                </div>
                                <span class="font-medium">Pago Móvil</span>
                            </div>
                        </div>

                        <div class="payment-method p-4 rounded-lg cursor-pointer"
                             wire:click="select_metodo('cripto')">>
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                                    <i class="fab fa-bitcoin text-purple-600"></i>
                                </div>
                                <span class="font-medium">Criptomoneda</span>
                            </div>
                        </div>

                        <div class="payment-method p-4 rounded-lg cursor-pointer"
                           wire:click="select_metodo('zinli')">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3">
                                    <i class="fas fa-wallet text-green-600"></i>
                                </div>
                                <span class="font-medium">Zinli</span>
                            </div>
                        </div>
                    </div>
                </div>
@if($metodo_pago=='pagoMovil')
                <div id="paymentDetails" class=" mb-6">
                    <h4 class="text-md font-bold text-gray-800 mb-3">Detalles del pago</h4>

                    <div id="pagoMovilDetails" class="bg-blue-50 p-4 rounded-lg ">
                        <div class="mb-3">
                            <p class="text-sm text-gray-600 mb-1">Realiza tu transferencia a:</p>
                            <p class="font-bold text-blue-700">0412-1234567</p>
                            <p class="text-sm text-gray-600">Banco: Banco de Venezuela</p>
                            <p class="text-sm text-gray-600">C.I.: V-12345678</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Monto total:</p>
                            <p class="font-bold text-blue-700">${{ $this->totalPrice }}</p>
                        </div>
                    </div>
                    @elseif ($metodo_pago=='cripto')
                    <div id="criptoDetails" class="bg-purple-50 p-4 rounded-lg ">
                        <div class="mb-3">
                            <p class="text-sm text-gray-600 mb-1">Envía USDT (TRC20) a:</p>
                            <p class="font-mono text-purple-700 break-all">TXYZ1234567890abcdefghijklmnopqrstuvw</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Monto total:</p>
                            <p class="font-bold text-purple-700">${{ $this->totalPrice }}</p>
                        </div>
                    </div>
@elseif ($metodo_pago=='zinli')
                    <div id="zinliDetails" class="bg-green-50 p-4 rounded-lg ">
                        <div class="mb-3">
                            <p class="text-sm text-gray-600 mb-1">Envía el dinero a:</p>
                            <p class="font-bold text-green-700">rifafacil@example.com</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Monto total:</p>
                            <p class="font-bold text-green-700">${{ $this->totalPrice }}</p>
                        </div>
                    </div>
@endif
                    <div class="mt-4">
                        <label for="paymentReference" class="block text-sm font-medium text-gray-700 mb-1">Referencia de
                            pago</label>
                            @php
                                if ($metodo_pago == 'pagoMovil') {
                                    $placeholder = 'Número de referencia de la transferencia';
                                } elseif ($metodo_pago == 'cripto') {
                                    $placeholder = 'Hash de la transacción en la blockchain';
                                } elseif ($metodo_pago == 'zinli') {
                                    $placeholder = 'ID de la transacción en Zinli';
                                } else {
                                    $placeholder = '';
                                }
                                    # code...


                                @endphp

                        <input type="text"
                         id="paymentReference"
                        wire:model="paymentReference"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="{{$placeholder}}">

                    </div>
                    @error('paymentReference')
<span class="text-red-500 text-sm">{{ $message }}</span>
@enderror
                </div>

    <!-- Visualización de los números asignados -->
    <div id="ticketNumbers" class="mb-6">
        <h4 class="text-md font-bold text-gray-800 mb-3">Tus números asignados</h4>
        <div class="flex flex-wrap gap-2">
            @foreach ($tickets as $ticket)
                <span class="ticket-number px-3 py-1 rounded-full">{{ $ticket }}</span>
            @endforeach
        </div>
    </div>

    <!-- Mostrar el precio total -->
    <div class="mb-6">
        <p class="text-lg font-semibold">Precio Total: ${{ $this->totalPrice }}</p>
    </div>
</div>

@if (session()->has('message'))
<div class="mt-4 p-2 bg-green-200 text-green-800">
    {{ session('message') }}
</div>
@endif
@error('rifaId')
<span class="text-red-500 text-sm">{{ $message }}</span>
@enderror
@error('ticketQuantity')
<span class="text-red-500 text-sm">{{ $message }}</span>
@enderror

@error('metodo_pago')
<span class="text-red-500 text-sm">{{ $message }}</span>
@enderror

@error('estado_pago')
<span class="text-red-500 text-sm">{{ $message }}</span>
@enderror




@if (session()->has('message'))
<div class="mt-4 p-2 bg-green-200 text-green-800">
    {{ session('error') }}
</div>
@endif


                <div class="flex justify-end">
                    <button wire:click="comprarBoletos"
                        class="bg-indigo-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-indigo-700 transition">
                        Confirmar Compra  g {{ $idrifa}}<i class="fas fa-check ml-1"></i>
                    </button>
                </div>
            </div>

@else
<div id="loginRequired" class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-6">
    <div class="flex">
        <div class="flex-shrink-0">
            <i class="fas fa-exclamation-circle text-yellow-400"></i>
        </div>
        <div class="ml-3">
            <p class="text-sm text-yellow-700">
                Debes <a href="#" class="font-medium text-yellow-700 underline hover:text-yellow-600"
                    onclick="showLoginForm()">iniciar sesión</a> y completar tu perfil para participar
                en esta rifa.
            </p>
        </div>
    </div>
</div>

            @endif
        </div>
    </div>
</div>



@endif


<!-- Purchase Confirmation Modal -->
@if($compraexito)
<div
    class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4 " >
    <div class="bg-white rounded-xl max-w-md w-full">
        <div class="p-6 text-center">
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-check text-green-600 text-3xl"></i>
            </div>

            <h2 class="text-2xl font-bold text-gray-800 mb-2">¡Compra Exitosa!</h2>
            <p class="text-gray-600 mb-6">Tus boletos han sido reservados. Revisa tu correo para más detalles.</p>

            <div class="mb-6 bg-gray-50 p-4 rounded-lg">
                <p class="text-sm text-gray-500 mb-1">Números asignados:</p>
                <div class="flex flex-wrap justify-center gap-2">
                    @foreach ($tickets as $ticket)
                    <span class="ticket-number px-3 py-1 rounded-full">{{ $ticket }}</span>
                @endforeach
                </div>
            </div>

            <button wire:click="closeCompraExito()"
                class="w-full bg-indigo-600 text-white px-4 py-3 rounded-lg font-bold hover:bg-indigo-700 transition">
                Aceptar
            </button>
        </div>
    </div>
</div>




@endif




</div>
