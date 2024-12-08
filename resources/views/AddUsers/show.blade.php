<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Trees 2</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/usersAdmin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image/png">
</head>

<body>
    @include('layoutAdmin.navbar')

    <section class="usuarios-lista-section">
        <div class="tabla-container">
            <h1 class="titulo-lista">Users List</h1>

            <table class="tabla-estilizada">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Country</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr class="usuario-row">
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->lastname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->number }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->country }}</td>
                            <td>{{ ucfirst($user->role) }}</td>
                            <td class="acciones">
                                <a href="/edit/{{ $user->id }}" class="btn-edit">Edit</a>
                                <form action="/delete/{{ $user->id }}" method="POST" class="form-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="no-users">No users found</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
            <div class="container-btnAdd">
                <a href="/AddUsers/main" class="btn btn-add-user">
                    Add User
                </a>
            </div>

        </div>
    </section>
</body>

</html>
