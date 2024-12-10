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
        <h2>Tree Update History</h2>


        @if ($updates->isEmpty())
            <p>You have no updates to show.</p>
        @else
            <div class="table-container">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Specie</th>
                            <th>Size</th>
                            <th>Date</th>
                            <th>Photo</th>
                            <th>Author</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($updates as $update)
                            <tr>
                                <td>{{ $update->tree->specie->comercialName }}</td>
                                <td>{{ $update->size }} cm</td>
                                <td>{{ \Carbon\Carbon::parse($update->date)->format('d/m/Y') }}</td>
                                <td>
                                    <img src="{{ Storage::url($update->photo) }}" alt="Foto del árbol" class="img-fluid"
                                        style="max-width: 100px;">
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
