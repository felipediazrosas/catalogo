<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;

class Ciudades extends Model
{
    use Searchable;

    protected $fillable = ['nombre', 'lat', 'lng'];

    protected $searchableFields = ['*'];

    public function allProductos()
    {
        return $this->belongsToMany(Productos::class, 'productociudad','id','productos_id')->withPivot('cantidad');
    }
}
