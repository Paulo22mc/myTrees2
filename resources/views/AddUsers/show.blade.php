<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <link rel="stylesheet" href=" {{ asset('css/style.css') }}">
    <link rel="stylesheet" href=" {{ asset('css/admin/usersAdmin.css') }}">
</head>

<body>
    @include('layoutAdmin.navbar')

    <section>
        <div >
            <h1>Users List</h1>

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
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->lastname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->number }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->country }}</td>
                            <td>{{ ucfirst($user->role) }}</td>
                            <td>
                                <a href="/edit/{{ $user->id }}" class="btn-edit">Edit</a>
                                <form action="/delete/{{ $user->id }}" method="POST" style="display:inline;">
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
            
            <div style="text-align: center; margin-top: 20px;">
                <a href="/AddUsers/main" class="btn" style="background-color: var(--colorBoton); text-decoration: none; color: var(--negro); padding: 10px 20px; border-radius: 5px; font-weight: bold;">
                    Add User
                </a>
            </div>
            
        </div>
    </section>
</body>

</html>
