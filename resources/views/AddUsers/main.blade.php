<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Trees 2</title>
    <link rel="stylesheet" href=" {{ asset('css/style.css') }}">
    <link rel="stylesheet" href=" {{ asset('css/admin/addUsers.css') }}">
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image/png">
</head>

<body>
    @include('layoutAdmin.navbar')

    <section class="section-formulario">
        <div class="contenedor-formulario">
            <form method="POST" action="{{ route('AddUsers.register') }}">
                @csrf

                <h1 class="titulo-formulario">Add New User</h1>

                @if ($errors->any())
                    <div class="error-mensajes">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="grupo-input">
                    <label for="firstName" class="etiqueta-input">First Name</label>
                    <input id="firstName" type="text" name="name" class="input-formulario"
                        value="{{ old('firstName') }}" required>
                </div>

                <div class="grupo-input">
                    <label for="lastName" class="etiqueta-input">Last Name</label>
                    <input id="lastName" type="text" name="lastName" class="input-formulario"
                        value="{{ old('lastName') }}" required>
                </div>

                <div class="grupo-input">
                    <label for="phoneNumber" class="etiqueta-input">Phone Number</label>
                    <input id="number" type="text" name="number" class="input-formulario"
                        value="{{ old('number') }}" required>
                </div>

                <div class="grupo-input">
                    <label for="email" class="etiqueta-input">Email Address</label>
                    <input id="email" type="email" name="email" class="input-formulario"
                        value="{{ old('email') }}" required>
                </div>

                <div class="grupo-input">
                    <label for="password" class="etiqueta-input">Password</label>
                    <input id="password" type="password" name="password" class="input-formulario" required>
                </div>

                <div class="grupo-input">
                    <label for="address" class="etiqueta-input">Address</label>
                    <input id="address" type="text" name="address" class="input-formulario"
                        value="{{ old('address') }}" required>
                </div>

                <div class="grupo-input">
                    <label for="country" class="etiqueta-input">Country</label>
                    <input id="country" type="text" name="country" class="input-formulario"
                        value="{{ old('country') }}" required>
                </div>

                <div class="grupo-input">
                    <label for="role" class="etiqueta-input">Role</label>
                    <select id="role" name="role" class="select-formulario" required>
                        <option value="" disabled {{ old('role') == '' ? 'selected' : '' }}>Select a role...
                        </option>
                        <option value="administrator" {{ old('role') == 'administrator' ? 'selected' : '' }}>
                            Administrator
                        </option>
                        <option value="operator" {{ old('role') == 'operator' ? 'selected' : '' }}>Operator</option>
                    </select>
                </div>

                <button type="submit" class="boton-formulario">Save User</button>
            </form>

            <a href="{{ route('AddUsers.show') }}" class="enlace-usuarios">See Users</a>
        </div>
    </section>
</body>

</html>
