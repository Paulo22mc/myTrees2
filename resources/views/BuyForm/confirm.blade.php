@extends('BuyForm.app')

@section('content')
    <div class="container">
        <h2>Confirmated Purchase</h2>

        <div class="confirmation-details">
            <h3>Tree Details</h3>
            <p><strong>Specie:</strong> {{ $tree->specie_name }}</p>
            <p><strong>Ubication:</strong> {{ $tree->ubication }}</p>
            <p><strong>Size (cm):</strong> {{ $tree->size }}</p>
            <p><strong>Price:</strong> ${{ number_format($tree->price, 2) }}</p>

            <div>
                <img src="https://life-urns.com/wp-content/uploads/2022/05/mata.png" alt="Imagen de {{ $tree->specie_name }}"
                    width="200">
            </div>
        </div>

        <div class="confirmation-message">
            <p>Thanks for your purchase</p>
        </div>

        <div>
            <a href="{{ route('loyoutFriend.main') }}" class="btn">Back</a>
        </div>
    </div>
@endsection
