@extends('BuyForm.app')

@section('content')
    <div class="container">
        <h2>Confirm Purchase</h2>

        <form action="{{ route('BuyForm.confirm') }}" method="POST">
            @csrf
            <input type="hidden" name="treeId" value="{{ $tree->id }}">
            
            <!-- Puedes permitir que el comprador seleccione su ID o agregarlo como un campo oculto -->
            <input type="hidden" name="buyerId" value="{{ old('buyerId') }}">

            <div class="tree-info">
                <label>Tree species:</label>
                <input type="text" value="{{ $tree->specie_name }}" readonly>

                <label>Ubication:</label>
                <input type="text" value="{{ $tree->ubication }}" readonly>

                <label>Size (cm):</label>
                <input type="text" value="{{ $tree->size }}" readonly>

                <label>Price:</label>
                <input type="text" value="$ {{ number_format($tree->price, 2) }}" readonly>

                <div>
                    <img src="https://life-urns.com/wp-content/uploads/2022/05/mata.png" alt="Imagen de {{ $tree->specie_name }}" width="200">
                </div>
            </div>

            <div class="buyer-info">
                <label>Name:</label>
                <input type="text" name="buyerName" value="{{ old('buyerName') }}" placeholder="Enter your name" required>
            </div>

            <div>
                <input type="submit" class="btn" value="Confirm">
                <a href="{{ route('BuyForm.main', $tree->id) }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection
