<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Trees 2</title>
    <link rel="stylesheet" href=" {{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image/png">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .table-container {
            margin-top: 40px;
        }
    </style>
</head>
<body>
    @include('layoutFriend.navbar')

    <div class="container mt-5">
        <h2>Historial de Actualizaciones de Árboles</h2>


        @if($updates->isEmpty())
            <p>No tienes actualizaciones para mostrar.</p>
        @else

            <div class="table-container">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Especie</th>
                            <th>Tamaño</th>
                            <th>Fecha de Actualización</th>
                            <th>Foto</th>
                            <th>Actualizado por</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($updates as $update)
                            <tr>
                                <td>{{ $update->tree->specie->comercialName }}</td>
                                <td>{{ $update->size }} cm</td>
                                <td>{{ \Carbon\Carbon::parse($update->date)->format('d/m/Y') }}</td>
                                <td>
                                    <img src="{{ Storage::url($update->photo) }}" alt="Foto del árbol" class="img-fluid" style="max-width: 100px;">
                                </td>
                                <td>{{ $update->user->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

</body>
</html>