@extends('treeForSale.main')

@section('content')
<div class="container">
    <h1>Árboles en Venta</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($trees->isEmpty())
        <p>No hay árboles en venta.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Specie</th>
                    <th>Ubication</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Photo</th>
                    <th>Publicado por</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trees as $tree)
                    <tr>
                        <td>{{ $tree->specie->name ?? 'Desconocida' }}</td>
                        <td>{{ $tree->ubication }}</td>
                        <td>{{ $tree->size }} cm</td>
                        <td>${{ $tree->price }}</td>
                        <td>
                            @if($tree->photo)
                                <img src="{{ asset('storage/' . $tree->photo) }}" alt="Foto" width="100">
                            @else
                                No photo
                            @endif
                        </td>
                        <td>{{ $tree->friend->name ?? 'Anónimo' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
