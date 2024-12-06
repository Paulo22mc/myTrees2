@extends('treeForSale.main')

@section('content')
    <h2>Trees for Sale</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Specie</th>
                <th>Ubication</th>
                <th>Size</th>
                <th>Price</th>
                <th>Status</th>
                <th>Photo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trees as $tree)
                <tr>
                    <td>{{ $tree->specie->name }}</td>
                    <td>{{ $tree->ubication }}</td>
                    <td>{{ $tree->size }} cm</td>
                    <td>₡{{ number_format($tree->price, 2) }}</td>
                    <td>{{ ucfirst($tree->status) }}</td>
                    <td><img src="{{ asset('storage/' . $tree->photo) }}" alt="Tree Photo" width="50"></td>
                    <td>
                        {{-- <a href="{{ route('treeSale.edit', $tree->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('treeSale.destroy', $tree->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
