@extends('treeForSale.main')

@section('content')
    <h2>Edit Tree for Sale</h2>

    <form action="{{ route('treeForSale.update', $tree->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') 

        <div class="form-group">
            <label for="treeSpecie">Tree Specie</label>
            <select id="treeSpecie" name="treeSpecie" class="form-control">
                @foreach ($species as $specie)
                    <option value="{{ $specie->id }}" {{ $specie->id == $tree->idSpecie ? 'selected' : '' }}>
                        {{ $specie->comercialName }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="ubication">Ubication</label>
            <input type="text" name="ubication" class="form-control" value="{{ old('ubication', $tree->ubication) }}" required>
        </div>

        <div class="form-group">
            <label for="size">Size (cm)</label>
            <input type="number" name="size" class="form-control" value="{{ old('size', $tree->size) }}" required>
        </div>

        <div class="form-group">
            <label for="price">Price (₡)</label>
            <input type="number" name="price" class="form-control" value="{{ old('price', $tree->price) }}" required>
        </div>

        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" name="photo" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="{{ route('treeForSale.show') }}" class="btn btn-secondary mt-3">See Trees</a>
    </form>
@endsection
