<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use Searchable;

    protected $fillable = ['nombre', 'precio', 'imagen', 'observacion'];

    protected $searchableFields = ['*'];

    public function allCiudades()
    {
        return $this->belongsToMany(Ciudades::class, 'productociudad')
        ->withPivot('cantidad');
    }
}
