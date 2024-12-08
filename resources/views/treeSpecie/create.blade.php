@extends('treeSpecie.main')

@section('content')
    <div class="container">
        <div class="form-container">
            <h2>Register New Tree Species</h2>

            <form action="{{ route('treeSpecie.save') }}" method="POST">
                @csrf

                <div class="input-contenedor">
                    <label for="comercialName">Comercial Name</label>
                    <input type="text" name="comercialName" id="comercialName" required>
                </div>

                <div class="input-contenedor">
                    <label for="scientificName">Scientific Name</label>
                    <input type="text" name="scientificName" id="scientificName" required>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>

                <a href="{{ route('treeSpecie.show') }}" class="btnSee">See Species</a>
            </form>

        </div>
    </div>
@endsection
