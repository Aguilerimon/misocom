<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Proveedor;
use App\Categoria;
use App\Sucursal;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['nombre', 'descripcion', 'precio','costo','proveedor_id', 'categoria_id', 'sucursal_id'];

    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
    public function sucursal(){
        return $this->belongsTo(Sucursal::class);
    }
}
