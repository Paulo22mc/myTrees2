@extends('treeForSale.main')

@section('content')
    <h2>Save Tree for Sale</h2>

    <form action="{{ route('treeForSale.save') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="input-contenedor">
            <label for="treeSpecie">Tree Specie</label>
            <select id="treeSpecie" name="treeSpecie" class="input-field">
                @foreach ($species as $specie)
                    <option value="{{ $specie->id }}">{{ $specie->comercialName }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-contenedor">
            <label for="ubication">Ubication</label>
            <input type="text" name="ubication" class="input-field" required>
        </div>

        <div class="input-contenedor">
            <label for="size">Size (cm)</label>
            <input type="number" name="size" class="input-field" required>
        </div>

        <div class="input-contenedor">
            <label for="price">Price (₡)</label>
            <input type="number" name="price" class="input-field" required>
        </div>

        <div class="input-contenedor">
            <label for="photo">Photo</label>
            <input type="file" name="photo" class="input-field" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Save Tree</button>
        <a href="{{ route('treeForSale.show') }}" class="btn btn-secondary">See Trees</a>

    </form>
@endsection
