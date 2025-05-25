@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Reglas de Participación en Rifas</h1>
    <p class="mb-4">Bienvenido a nuestra plataforma de rifas. A continuación, se detallan las reglas y condiciones que debes seguir para participar:</p>
    
    <ul class="list-disc pl-5 mb-4">
        <li>La participación en las rifas está abierta a todos los usuarios registrados en la plataforma.</li>
        <li>Cada usuario puede comprar múltiples boletos para aumentar sus posibilidades de ganar.</li>
        <li>Los boletos son asignados de manera aleatoria y se mostrarán en tu perfil una vez completada la compra.</li>
        <li>Los pagos deben ser realizados a través de los métodos habilitados en la plataforma.</li>
        <li>Es responsabilidad del usuario asegurarse de que la información de su perfil esté actualizada para la entrega de premios.</li>
        <li>Los ganadores serán notificados a través de la plataforma y por correo electrónico.</li>
        <li>Las rifas pueden tener un límite de tiempo y/o un número máximo de boletos disponibles.</li>
        <li>Nos reservamos el derecho de descalificar a cualquier participante que no cumpla con estas reglas.</li>
    </ul>

    <p class="mb-4">¡Buena suerte y gracias por participar!</p>
</div>
@endsection