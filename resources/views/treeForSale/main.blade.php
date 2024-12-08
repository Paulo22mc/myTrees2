<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Trees 2 </title>
    <link rel="stylesheet" href=" {{ asset('css/style.css') }}">
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image/png">
    <link rel="stylesheet" href=" {{ asset('css/admin/treeSpecies.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image/png">

</head>
<body>

    @include('layoutadmin.navbar')

    <div class="form-container">
        @yield('content')
    </div>



</body>
</html>
