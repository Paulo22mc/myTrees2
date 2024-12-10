@extends('treeSpecie.main')

@section('content')
    <div class="edit-container">
        <div class="form-container">
            <h2 class="edit-title">Edit Tree Species</h2>
            <form action="{{ route('treeSpecie.update', $tree->id) }}" method="POST" class="edit-form">
                @csrf
                @method('PUT')

                <div class="input-contenedor">
                    <label for="comercialName" class="form-label">Commercial Name</label>
                    <input type="text" name="comercialName" id="comercialName" class="form-input"
                        value="{{ $tree->comercialName }}" required>
                </div>

                <div class="input-contenedor">
                    <label for="scientificName" class="form-label">Scientific Name</label>
                    <input type="text" name="scientificName" id="scientificName" class="form-input"
                        value="{{ $tree->scientificName }}" required>
                </div>

                <div class="input-contenedor">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('treeSpecie.show') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
