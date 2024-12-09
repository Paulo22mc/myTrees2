<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreeSpecies extends Model
{
    use HasFactory;

    // Nombre personalizado de la tabla
    protected $table = 'treeSpecie';

    // Atributos asignables
    protected $fillable = [
        'comercialName',
        'scientificName'
    ];

    // Relación con los árboles en venta
    public function trees()
    {
        return $this->hasMany(TreeForSale::class, 'idSpecie', 'id');
    }
}

