<div class="treeTableContainer">
    <table class="treeTable">
        <thead>
            <tr>
                <th>Commercial Name</th>
                <th>Price</th>
                <th>Size</th>
                <th>Photo</th>
                <th>Ubication</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($trees as $tree)
                <tr>
                    <td>{{ $tree->commercialName }}</td>  <!-- Nombre comercial de la especie -->
                    <td>${{ $tree->price }}</td>  <!-- Precio -->
                    <td>{{ $tree->size }} cm</td>  <!-- Tamaño -->
                    <td><img src="{{ asset('images/trees/' . $tree->photo) }}" alt="{{ $tree->name }}" width="50"></td>  <!-- Foto -->
                    <td>{{ $tree->ubication }}</td>  <!-- Ubicación -->
                </tr>
            @empty
                <tr>
                    <td colspan="8">No trees found.</td>  <!-- Mensaje si no hay árboles -->
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
