<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Trees 2</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/updates.css') }}">
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    @include('layoutAdmin.navbar')

    <div class="sold-trees-page">
        <h2>Sold Trees</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Comercial Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trees as $tree)
                    <tr>
                        <td>{{ $tree->id }}</td>
                        <td>{{ $tree->specie->comercialName ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('updates.create', $tree->id) }}" class="action-button">Update</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('updates.show') }}" class="see-updates-link">See All Updates</a>
    </div>
</body>

</html>
