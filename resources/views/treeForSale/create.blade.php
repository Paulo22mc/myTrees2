@extends('treeForSale.main')

@section('content')
    <h2>Save Tree for Sale</h2>

    <form action="{{ route('treeForSale.save') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="treeSpecie">Tree Specie</label>
            <select id="treeSpecie" name="treeSpecie" class="form-control">
                @foreach ($species as $specie)
                    <option value="{{ $specie->id }}">{{ $specie->comercialName }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="ubication">Ubication</label>
            <input type="text" name="ubication" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="size">Size (cm)</label>
            <input type="number" name="size" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="price">Price (₡)</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" name="photo" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Save Tree</button>
    </form>
@endsection
