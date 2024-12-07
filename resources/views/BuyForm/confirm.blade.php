@extends('BuyForm.app')

@section('content')
    <div class="container">
        <h2>Compra Confirmada</h2>

        <div class="confirmation-details">
            <h3>Detalles del Árbol:</h3>
            <p><strong>Especie:</strong> {{ $tree->specie_name }}</p>
            <p><strong>Ubicación:</strong> {{ $tree->ubication }}</p>
            <p><strong>Tamaño (cm):</strong> {{ $tree->size }}</p>
            <p><strong>Precio:</strong> ${{ number_format($tree->price, 2) }}</p>

            <div>
                <img src="https://life-urns.com/wp-content/uploads/2022/05/mata.png" alt="Imagen de {{ $tree->specie_name }}" width="200">
            </div>
        </div>

        <div class="buyer-details">
            <h3>Detalles del Comprador:</h3>
            <p><strong>Nombre:</strong> {{ $buyer->name }}</p>
            <p><strong>Correo:</strong> {{ $buyer->email }}</p>
        </div>

        <div class="confirmation-message">
            <p>¡La compra se ha realizado con éxito!</p>
            <p>Gracias por elegirnos.</p>
        </div>

        <div>
            <a href="{{ route('loyoutFriend.main') }}" class="btn">Volver al inicio</a>
        </div>
    </div>
@endsection
