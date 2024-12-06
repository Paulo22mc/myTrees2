@extends('treeSpecie.main')

@section('content')
    <div class="container">
        <h2>Registered Tree Species</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Comercial Name</th>
                    <th>Scientific Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trees as $tree)
                <tr>
                    <td>{{ $tree->comercialName }}</td>
                    <td>{{ $tree->scientificName }}</td>
                    <td>
                        <a href="{{ route('treeSpecie.edit', ['id' => $tree->id]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('treeSpecie.destroy', $tree->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this species?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            

            </tbody>
        </table>

        <a href="{{ route('treeSpecie.create') }}" class="action-button edit">Add New Species</a>
    </div>
@endsection
