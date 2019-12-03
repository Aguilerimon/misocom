<?php

use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    protected $table;

    public function __construct()
    {
        $this->table = 'productos';
    }
    public function run()
    {
        DB::table($this->table)->delete();
        DB::table($this->table)->insert([
            'nombre' => 'Doritos Nachos',
            'descripcion' => 'Doritos clasicos con chile y queso',
            'precio' => 10.50,
            'costo' => 9.50,
            'proveedor_id' => App\Proveedor::all()->random()->id,
            'categoria_id' => App\Categoria::all()->random()->id,
            'sucursal_id' => App\Sucursal::all()->random()->id,
            'created_at' => '2019-04-16',
            'updated_at' => '2019-04-16',
        ]);

        DB::table($this->table)->insert([
            'nombre' => 'Coca-Cola 500ml',
            'descripcion' => 'Coca-Cola clasica en su version de 500ml',
            'precio' => 60.50,
            'costo' => 50.50,
            'proveedor_id' => App\Proveedor::all()->random()->id,
            'categoria_id' => App\Categoria::all()->random()->id,
            'sucursal_id' => App\Sucursal::all()->random()->id,
            'created_at' => '2019-04-16',
            'updated_at' => '2019-04-16',
        ]);

        DB::table($this->table)->insert([
            'nombre' => 'Galletas Emperador',
            'descripcion' => 'Galletas Emperador combinado',
            'precio' => 60.50,
            'costo' => 50.50,
            'proveedor_id' => App\Proveedor::all()->random()->id,
            'categoria_id' => App\Categoria::all()->random()->id,
            'sucursal_id' => App\Sucursal::all()->random()->id,
            'created_at' => '2019-04-16',
            'updated_at' => '2019-04-16',
        ]);

        DB::table($this->table)->insert([
            'nombre' => 'Leche San Marcos 1lt',
            'descripcion' => 'Leche San Marcos entera de 1lt',
            'precio' => 60.50,
            'costo' => 50.50,
            'proveedor_id' => App\Proveedor::all()->random()->id,
            'categoria_id' => App\Categoria::all()->random()->id,
            'sucursal_id' => App\Sucursal::all()->random()->id,
            'created_at' => '2019-04-16',
            'updated_at' => '2019-04-16',
        ]);
    }
}
