<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tree Species </title>
    <link rel="stylesheet" href=" {{ asset('css/style.css') }}">
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image/png">
    <link rel="stylesheet" href=" {{ asset('css/admin/treeSpecies.css') }}">

</head>
<body>

    @include('layoutadmin.navbar')

    <div class="container">
        @yield('content')
    </div>

    <!-- Footer común -->
    <footer class="footer bg-light text-center py-3">
        <p>&copy; 2024 Tree Species Management</p>
    </footer>

    <!-- Scripts comunes -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
