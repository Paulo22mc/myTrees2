<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Trees 2</title>
    <link rel="stylesheet" href=" {{ asset('css/friend/dashboard.css') }}">
    <link rel="stylesheet" href=" {{ asset('css/style.css') }}">
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image/png">
</head>
<body>
    @include('layoutFriend.navbar')

    <main>
        @yield('content') <!-- Aquí es donde se insertará el contenido de cada vista que lo use -->
    </main>


</body>
</html>
