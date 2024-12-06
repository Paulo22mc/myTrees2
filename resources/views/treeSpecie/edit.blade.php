<form action="{{ route('treeSpecie.update', ['id' => $tree->id]) }}" method="POST">
    @csrf
    @method('PUT') 

    <div class="input-contenedor">
        <label for="comercialName">Comercial Name</label>
        <input type="text" name="comercialName" id="comercialName" value="{{ old('comercialName', $tree->comercialName) }}" required>
    </div>

    <div class="input-contenedor">
        <label for="scientificName">Scientific Name</label>
        <input type="text" name="scientificName" id="scientificName" value="{{ old('scientificName', $tree->scientificName) }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>
