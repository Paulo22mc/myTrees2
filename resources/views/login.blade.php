<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image/png"> {{-- Asset: generar url --}}
    <title>My Trees 2</title>
</head>

<body>
    <section>
        <div class="contenedor">
            <div class="formulario">

                <!-- Mensaje de error -->
                @if (session('status') == 'login')
                    <div class="msg">User/Password do not correct</div>
                @endif

                <form action="{{ route('login') }}" method="POST" class="form-inline" role="form">
                    @csrf
                    <h1>Login</h1>

                    <div class="input-contenedor">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-envelope-fill" viewBox="0 0 16 16">
                            <path
                                d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z" />
                        </svg>
                        <input type="email" name="email" required>
                        <label for="#">Email</label>
                    </div>

                    <div class="input-contenedor">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-lock-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2" />
                        </svg>
                        <input type="password" name="password" required>
                        <label for="">Password</label>
                    </div>

                    <div>
                        <input type="submit" class="btn" value="Login">
                        <div class="registrar">
                            <p>I am not registered yet <a href="{{ route('register') }}">Sign Up</a></p>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
</body>

</html>
