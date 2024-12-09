
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tree Updates</title>
    <!-- Incluye tus archivos CSS o el enlace a Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('layoutAdmin.navbar')
    <div class="container">
        <h2>Árboles Vendidos</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Comercial</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Usando la sintaxis Blade para iterar sobre el arreglo de árboles -->
                @foreach ($trees as $tree)
                    <tr>
                        <td>{{ $tree->id }}</td>
                        <td>{{ $tree->comercialName }}</td>
                        <td>
                            <a href="{{ route('updates.create', $tree->id) }}" class="btn btn-primary">Actualizar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</body>
</html>

