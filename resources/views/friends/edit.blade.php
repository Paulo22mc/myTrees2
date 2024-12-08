@extends('friends.app')

@section('content')
    <h2>Edit Tree: {{ $tree->name }}</h2>
    
        <form action="{{ route('tree.update', ['id' => $tree->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="idSpecie">Species</label>
                <select id="idSpecie" name="idSpecie" required>
                    @foreach ($species as $specie)
                        <option value="{{ $specie->id }}" 
                                {{ $tree->idSpecie == $specie->id ? 'selected' : '' }}>
                            {{ $specie->comercialName }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="size">Size (cm)</label>
                <input type="number" id="size" min=15 name="size" value="{{ $tree->size }}" required>
            </div>

            <div class="form-group">
                <label for="ubication">Ubication</label>
                <input type="text" id="ubication" name="ubication" value="{{ $tree->ubication }}" required>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <div>
                    <label>
                        <input type="radio" name="status" value="available" 
                            {{ $tree->status == 'available' ? 'checked' : '' }}>
                        Available
                    </label>
                    <label>
                        <input type="radio" name="status" value="sold" 
                            {{ $tree->status == 'sold' ? 'checked' : '' }}>
                        Sold
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" id="photo" name="photo">
                @if ($tree->photo)
                    <img src="{{ asset('storage/' . $tree->photo) }}" alt="Tree Photo" class="tree-photo-preview">
                @endif
            </div>

            <div class="form-buttons">
                <button type="submit" class="action-button">Save Changes</button>
                <a href="{{ route('friendDetails', ['id' => $tree->idFriend]) }}" class="cancel-button">Cancel</a>
            </div>
        </form>
@endsection
