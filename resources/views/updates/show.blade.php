<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Tree Updates</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @include('layoutAdmin.navbar')

    <div class="container">
        <h2>All Tree Updates</h2>

        <!-- Mostrar mensajes de éxito o error -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabla con los datos de los árboles -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID Tree</th>
                    <th>User</th>
                    <th>Size</th>
                    <th>Photo</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trees as $tree)
                    <tr>
                        <td>{{ $tree->idTree }}</td>
                        <td>{{ $tree->user->name }}</td> 
                        <td>{{ $tree->size }}</td>
                        <td>
                            @if($tree->photo)
                                <img src="{{ asset('storage/' . $tree->photo) }}" alt="Tree Photo" width="100">
                            @else
                                No Photo
                            @endif
                        </td>
                        <td>{{ $tree->date }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
