<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Tree</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @include('layoutAdmin.navbar')
    <h1>Update Tree</h1>
    <form action="{{ route('tree-updates.save') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- ID del árbol, que es necesario para actualizarlo -->
        <input type="hidden" name="idTree" value="{{ $tree->id }}">

        <label for="size">Size (cm):</label>
        <input type="number" name="size" id="size" value="{{ $tree->size }}" min="1" required>

        <label for="photo">Upload Photo:</label>
        <input type="file" name="photo" id="photo" accept="image/*">

        <button type="submit">Save</button>
    </form>
</body>
</html>
