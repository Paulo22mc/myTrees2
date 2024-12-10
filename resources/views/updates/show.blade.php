<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Trees 2</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/showUpdates.css') }}">
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    @include('layoutAdmin.navbar')

    <div class="tree-updates-page">
        <h2>Tree Updates</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tree ID</th>
                    <th>User</th>
                    <th>Size</th>
                    <th>Photo</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($updates as $update)
                    <tr>
                        <td>{{ $update->id }}</td>
                        <td>{{ $update->idTree }}</td>
                        <td>{{ $update->user->name }} {{ $update->user->lastname }}</td>
                        <td>{{ $update->size }} cm</td>
                        <td>
                            <img src="{{ asset('storage/' . $update->photo) }}" alt="Photo" width="100">
                        </td>
                        <td>{{ $update->date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('updates.main') }}" class="back-link">Back</a>
    </div>
</body>

</html>
