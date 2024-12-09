@extends('friends.app')

@section('content')
    <h2>Details of Friend: {{ $friend->name }}</h2>
    <div>
        <h3>Trees Registered</h3>
        <table>
            <thead>
                <tr>
                    <th>Commercial Name</th>
                    <th>Size</th>
                    <th>Ubication</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trees as $tree)
                    <tr>
                        <td>{{ $tree->comercialName }}</td>
                        <td>{{ $tree->size }}</td>
                        <td>{{ $tree->ubication }}</td>
                        <td>
                            @if($tree->photo)
                                <a href="{{ asset('storage/' . $tree->photo) }}" target="_blank">View Photo</a>
                            @else
                                No Photo
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('friends.edit', ['id' => $tree->id]) }}" class="action-button">Edit</a>
                            <a href="{{ route('updates.edit', ['id' => $tree->id]) }}" class="action-button">Update</a>


                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
