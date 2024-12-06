<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href=" {{ asset('css/style.css') }}">
    <link rel="stylesheet" href=" {{ asset('css/admin/addUsers.css') }}">

    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image/png">

</head>

<body>
    @include('layoutAdmin.navbar')

    <section>
        <div class="contenedor">
            <div class="formulario">
                <!-- Formulario en Laravel -->
                <form method="POST" action="{{ route('AddUsers.register') }}">
                    @csrf <!-- Token CSRF para seguridad -->

                    <h1>Add New User</h1>

                    <div class="error">
                        @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li style="color:red;">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <div class="input-contenedor">
                        <label for="firstName">First Name</label>
                        <input id="firstName" type="text" name="name" value="{{ old('firstName') }}" required>
                    </div>

                    <div class="input-contenedor">
                        <label for="lastName">Last Name</label>
                        <input id="lastName" type="text" name="lastName" value="{{ old('lastName') }}" required>
                    </div>

                    <div class="input-contenedor">
                        <label for="phoneNumber">Phone Number</label>
                        <input id="number" type="text" name="number" value="{{ old('number') }}" required>
                    </div>

                    <div class="input-contenedor">
                        <label for="email">Email Address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                    </div>

                    <div class="input-contenedor">
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password" required>
                    </div>

                    <div class="input-contenedor">
                        <label for="address">Address</label>
                        <input id="address" type="text" name="address" value="{{ old('address') }}" required>
                    </div>

                    <div class="input-contenedor">
                        <label for="country">Country</label>
                        <input id="country" type="text" name="country" value="{{ old('country') }}" required>
                    </div>

                    <!-- Combo box para seleccionar el rol -->
                    <select id="role" name="role" required>
                        <option value="" disabled {{ old('role') == '' ? 'selected' : '' }}>Select a role...
                        </option>
                        <option value="administrator" {{ old('role') == 'administrator' ? 'selected' : '' }}>
                            Administrator</option>
                        <option value="operator" {{ old('role') == 'operator' ? 'selected' : '' }}>Operator</option>
                    </select>


                    <input type="submit" class="btn" value="Save User">
                </form>
            </div>
        </div>
    </section>
</body>

</html>
