@extends('friends.app')

@section('content')
    <h2>Update: {{ $tree->name }}</h2>

    <form action="{{ route('tree.update', ['id' => $tree->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <h3 for="idSpecie">Species: {{ $tree->specie->comercialName }}</h3>
        </div>
    
        <div class="form-group">
            <label for="size">Size (cm)</label>
            <input type="number" id="size" min="1" name="size" value="{{ $tree->size }}" required>
        </div>
    
        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" id="photo" name="photo" accept="image/*">
            @if ($tree->photo)
                <img src="{{ asset('storage/' . $tree->photo) }}" alt="Tree Photo" width="100">
            @endif
        </div>
    
        <div class="form-buttons">
            <button type="submit" class="action-button">Save Changes</button>
            <a href="{{ route('friendDetails', ['id' => $tree->idFriend]) }}" class="cancel-button">Cancel</a>
        </div>
    </form>
    
@endsection
