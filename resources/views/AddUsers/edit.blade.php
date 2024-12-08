<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Trees 2</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/admin/editUser.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image/png">
</head>
<body>
    @include('layoutAdmin.navbar')

    <section class="edit-user-section">
        <div class="edit-user-container">
            <h1 class="edit-user-title">Edit User</h1>
            <form action="/update/{{ $user->id }}" method="POST" class="edit-user-form">
                @csrf
                @method('PUT')

                <div class="input-container">
                    <label for="name" class="input-label">First Name</label>
                    <input type="text" id="name" name="name" class="input-field" value="{{ $user->name }}" required>
                </div>

                <div class="input-container">
                    <label for="lastName" class="input-label">Last Name</label>
                    <input type="text" id="lastName" name="lastName" class="input-field" value="{{ $user->lastname }}" required>
                </div>

                <div class="input-container">
                    <label for="email" class="input-label">Email</label>
                    <input type="email" id="email" name="email" class="input-field" value="{{ $user->email }}" required>
                </div>

                <div class="input-container">
                    <label for="number" class="input-label">Phone</label>
                    <input type="text" id="number" name="number" class="input-field" value="{{ $user->number }}" required>
                </div>

                <div class="input-container">
                    <label for="address" class="input-label">Address</label>
                    <input type="text" id="address" name="address" class="input-field" value="{{ $user->address }}" required>
                </div>

                <div class="input-container">
                    <label for="country" class="input-label">Country</label>
                    <input type="text" id="country" name="country" class="input-field" value="{{ $user->country }}" required>
                </div>

                <div class="input-container">
                    <label for="role" class="input-label">Role</label>
                    <select id="role" name="role" class="input-field select-field" required>
                        <option value="administrator" {{ $user->role == 'administrator' ? 'selected' : '' }}>Administrator</option>
                        <option value="operator" {{ $user->role == 'operator' ? 'selected' : '' }}>Operator</option>
                    </select>
                </div>

                <button type="submit" class="btn-submit">Save Changes</button>
                <a href="/users" class="btn-cancel">Cancel</a>
            </form>
        </div>
    </section>
</body>
</html>
