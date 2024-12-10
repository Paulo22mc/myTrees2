<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Trees 2</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/updateProcess.css') }}">
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    @include('layoutAdmin.navbar')

    <div class="update-tree-page">
        <h2>Update Tree</h2>

        <form action="{{ route('TreeUpdates.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="idTree" value="{{ $tree->id }}">

            <div class="form-group">
                <label for="size">Size</label>
                <input type="number" name="size" id="size" class="form-control-size" required min="1"
                    step="0.01">
            </div>

            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" name="photo" id="photo" class="form-control" accept="image/*" required>
            </div>

            <button type="submit" class="btn">Save Update</button>

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

        <a href="{{ route('updates.main') }}" class="back-link">Cancel</a>
    </div>

</body>

</html>
