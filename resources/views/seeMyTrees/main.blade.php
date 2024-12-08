<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Trees 2</title>
    <link rel="stylesheet" href="{{ asset('css/friend/seeMyTrees.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image/png">
</head>

<body>

    @include('layoutFriend.navbar')

    <h2>All My Trees</h2>

    <table>
        <thead>
            <tr>
                <th>Photo</th>
                <th>Specie</th>
                <th>Location</th>
                <th>Status</th>
                <th>Size</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trees as $tree)
                <tr>
                    <td><img src="{{ asset('storage/' . $tree->photo) }}" alt="Tree photo" width="100"></td>
                    <td>{{ $tree->species->comercialName }}</td>
                    <td>{{ $tree->ubication }}</td>
                    <td>{{ $tree->status }}</td>
                    <td>{{ $tree->size }}</td>
                    <td>${{ number_format($tree->price, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


</body>

</html>
