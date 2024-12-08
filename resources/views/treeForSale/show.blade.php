@extends('treeForSale.main')

@section('content')
<div class="container">
    <h2>Árboles en Venta</h2>

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
                    <th>Acciones</th> <!-- Columna para botones de acción -->
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
                        <td>
                            <!-- Enlace para editar -->
                            <a href="{{ route('treeForSale.edit', $tree->id) }}" class="btn btn-warning btn-sm">Editar</a>

                            <!-- Formulario para eliminar (con método DELETE) -->
                            <form action="{{ route('treeForSale.destroy', $tree->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este árbol?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <!-- Botón "Volver" -->
    <a href="{{ route('treeForSale.create') }}" class="btn btn-primary">Back</a>
</div>
@endsection
