<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Trees</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    @include('layoutFriend.navbar')


    <div class="container mt-5">
        <h2 class="mb-4">Available Trees</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Specie</th> 
                    <th>Ubication</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trees as $tree)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $tree->photo) }}" alt="Tree photo" width="100">
                        </td>
                        <td>{{ $tree->specie->comercialName }}</td>
                        <td>{{ $tree->ubication }}</td>
                        <td>{{ $tree->size }}</td>
                        <td>${{ $tree->price }}</td>
                        <td>
                            <a href="{{ route('BuyForm.main', ['id' => $tree->id]) }}" class="btn btn-primary">
                                Buy Now
                            </a> 
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
