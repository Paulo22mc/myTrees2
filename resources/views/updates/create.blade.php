<!-- resources/views/treesupdate/create.blade.php -->


@section('content')
<div class="container">
    <h1>Registrar actualización del árbol</h1>

    <!-- Mostrar mensajes de éxito o error -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('TreeUpdates.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="idTree">Árbol</label>
            <select name="idTree" id="idTree" class="form-control" required>
                <option value="">Seleccione un árbol</option>
                @foreach($trees as $tree)
                    <option value="{{ $tree->id }}">{{ $tree->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="size">Tamaño</label>
            <input type="number" name="size" id="size" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="photo">Foto</label>
            <input type="file" name="photo" id="photo" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Registrar actualización</button>
    </form>
</div>
@endsection
