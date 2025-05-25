<div>

<!-- Profile Completion Modal -->


@if ($showModal)


<div class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl max-w-md w-full">
        <div class="p-6">
            <div class="flex justify-between items-start mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Completa tu perfil</h2>
                <button wire:click="closeform" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <p class="text-gray-600 mb-6">Para participar en rifas, necesitamos que completes la siguiente información:</p>

            <form wire:submit.prevent="updateProfile">
                <div class="mb-4">
                    <label for="apellido" class="block text-sm font-medium text-gray-700 mb-1">Apellido</label>
                    <input type="text" id="apellido" wire:model="apellido"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500">
                    @error('apellido') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="telefono" class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
                    <input type="tel" id="telefono" wire:model="telefono"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500">
                    @error('telefono') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-6">
                    <label for="numero_id" class="block text-sm font-medium text-gray-700 mb-1">Número de Cédula</label>
                    <input type="text" id="numero_id" wire:model="numero_id"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500">
                    @error('numero_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <button type="submit"
                        class="w-full bg-indigo-600 text-white px-4 py-3 rounded-lg font-bold hover:bg-indigo-700 transition">
                    Guardar y Continuar
                </button>
            </form>
        </div>
    </div>

@endif










</div>





@if($update_profile_exito)
<div
    class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4 " >
    <div class="bg-white rounded-xl max-w-md w-full">
        <div class="p-6 text-center">
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-check text-green-600 text-3xl"></i>
            </div>

            <h2 class="text-2xl font-bold text-gray-800 mb-2">¡Registro Completado!</h2>
            <p class="text-gray-600 mb-6">Perfil actualizado correctamente.</p>



            <button wire:click="closeform()"
                class="w-full bg-indigo-600 text-white px-4 py-3 rounded-lg font-bold hover:bg-indigo-700 transition">
                Aceptar
            </button>
        </div>
    </div>
</div>

@endif




</div>
