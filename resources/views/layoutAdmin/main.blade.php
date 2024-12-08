<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Trees 2</title>
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image/png">

</head>
<body>
    @include('layoutAdmin.navbar')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-4 col-12 mb-4">
                <div class="card shadow-sm border-left-primary card-shadow">
                    <div class="card-body text-center">
                        <div>
                            <h5 class="card-title text-primary">Registered Friends</h5>
                            <h3>{{ $totalFriends }}</h3>
                            <p class="card-text text-muted">Total Friends</p>
                        </div>
                        <div class="icon-container">
                            <i class="fas fa-users text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-lg-3 col-md-4 col-12 mb-4">
                <div class="card shadow-sm border-left-success card-shadow">
                    <div class="card-body text-center">
                        <div>
                            <h5 class="card-title text-success">Available Trees</h5>
                            <h3>{{ $totalAvailableTrees }}</h3>
                            <p class="card-text text-muted">Total Trees Available</p>
                        </div>
                        <div class="icon-container">
                            <i class="fas fa-leaf text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-lg-3 col-md-4 col-12 mb-4">
                <div class="card shadow-sm border-left-danger card-shadow">
                    <div class="card-body text-center">
                        <div>
                            <h5 class="card-title text-danger">Sold Trees</h5>
                            <h3>{{ $totalSoldTrees }}</h3>
                            <p class="card-text text-muted">Total Trees Sold</p>
                        </div>
                        <div class="icon-container">
                            <i class="fas fa-check-circle text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
