
@section('content')
<div class="container">
    <h1 class="mb-4">Registrar Actualización del Árbol</h1>

    <form action="{{ route('updates.save') }}" method="" enctype="multipart/form-data">
        @csrf 

        <!-- Selección del árbol -->
        <div class="mb-3">
            <label for="idTree" class="form-label">Árbol</label>
            <select name="idTree" id="idTree" class="form-control @error('idTree') is-invalid @enderror" required>
                <option value="" selected disabled>Seleccione un árbol</option>

                @foreach($trees as $tree)
                    <option value="{{ $tree->id }}">{{ $tree->name }}</option>
                @endforeach
            </select>
            @error('idTree')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tamaño del árbol -->
        <div class="mb-3">
            <label for="size" class="form-label">Tamaño del Árbol (en cm)</label>
            <input type="number" name="size" id="size" class="form-control @error('size') is-invalid @enderror" value="{{ old('size') }}" required>
            @error('size')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Foto del árbol -->
        <div class="mb-3">
            <label for="photo" class="form-label">Foto del Árbol</label>
            <input type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror" accept="image/*" required>
            @error('photo')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Botón de envío -->
        <button type="submit" class="btn btn-primary">Registrar Actualización</button>
    </form>
</div>
@endsection
