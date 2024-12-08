@extends('friends.app')

@section('content')
    <h2>Registered Friends</h2>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Friend Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($friends as $friend)
                    <tr>
                        <td>{{ $friend->name }}</td>
                        <td>{{ $friend->email }}</td>
                        <td><a href="{{ route('friendDetails', ['id' => $friend->id]) }}" class="action-button">See more</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
