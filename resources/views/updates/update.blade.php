<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Árbol</title>
</head>

<body>
    @include('layoutAdmin.navbar')
    <div class="container">
        <h2>Actualizar Árbol </h2>

        <form action="{{ route('TreeUpdates.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- ID del árbol -->
            <input type="hidden" name="idTree" value="{{ $tree->id }}">

            <!-- Campo para el tamaño -->
            <div class="form-group">
                <label for="size">Size</label>
                <input type="number" name="size" id="size" class="form-control" required min="1"
                    step="0.01">
            </div>

            <!-- Campo para la foto -->
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" name="photo" id="photo" class="form-control" accept="image/*" required>
            </div>

            <!-- Botón de envío -->
            <button type="submit" class="btn btn-success">Save Update</button>


            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </form>
    </div>

    <!-- Incluye tus archivos JS o el enlace a Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
