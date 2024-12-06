<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    @include('layoutAdmin.navbar')

    <section>
        <div class="contenedor">
            <h1>Edit User</h1>
            <form action="/update/{{ $user->id }}" method="POST">
                @csrf
                @method('PUT')

                <div class="input-contenedor">
                    <label for="name">First Name</label>
                    <input type="text" id="name" name="name" value="{{ $user->name }}" required>
                </div>

                <div class="input-contenedor">
                    <label for="lastName">Last Name</label>
                    <input type="text" id="lastName" name="lastName" value="{{ $user->lastName }}" required>
                </div>

                <div class="input-contenedor">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}" required>
                </div>

                <div class="input-contenedor">
                    <label for="number">Phone</label>
                    <input type="text" id="number" name="number" value="{{ $user->number }}" required>
                </div>

                <div class="input-contenedor">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" value="{{ $user->address }}" required>
                </div>

                <div class="input-contenedor">
                    <label for="country">Country</label>
                    <input type="text" id="country" name="country" value="{{ $user->country }}" required>
                </div>

                <div class="input-contenedor">
                    <label for="role">Role</label>
                    <select id="role" name="role" required>
                        <option value="administrator" {{ $user->role == 'administrator' ? 'selected' : '' }}>Administrator</option>
                        <option value="operator" {{ $user->role == 'operator' ? 'selected' : '' }}>Operator</option>
                    </select>
                </div>

                <button type="submit" class="btn">Save Changes</button>
                <a href="/users" class="btn" style="background-color: gray; color: white; text-decoration: none;">Cancel</a>
            </form>
        </div>
    </section>
</body>
</html>
