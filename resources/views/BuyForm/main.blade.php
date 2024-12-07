@extends('BuyForm.app')

@section('content')
    <div class="purchase-container">
        <h2 class="purchase-title">Confirm Purchase</h2>

        <form action="{{ route('BuyForm.confirm') }}" method="POST" class="purchase-form">
            @csrf
            <input type="hidden" name="treeId" value="{{ $tree->id }}">
            
            <input type="hidden" name="buyerId" value="{{ old('buyerId') }}">

            <div class="tree-details">
                <label>Tree specie:</label>
                <input type="text" value="{{ $tree->specie->comercialName }}" readonly>
            
                <label>Ubication:</label>
                <input type="text" value="{{ $tree->ubication }}" readonly>
            
                <label>Size (cm):</label>
                <input type="text" value="{{ $tree->size }}" readonly>
            
                <label>Price:</label>
                <input type="text" value="₡ {{ number_format($tree->price, 2) }}" readonly>
            </div>
            
            <div>
                <input type="submit" class="btn-confirm" value="Confirm">
                <a href="{{ route('availableTrees.main') }}" class="purchase-link">Cancel</a>

            </div>
        </form>
    </div>
@endsection
