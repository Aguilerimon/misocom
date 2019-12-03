<?php

use Illuminate\Database\Seeder;

class ProveedoresSeeder extends Seeder
{
    protected $table;

    public function __construct()
    {
        $this->table = 'proveedores';
    }
    public function run()
    {
        DB::table($this->table)->delete();
        DB::table($this->table)->insert([
            'nombre' => 'Sabritas',
            'direccion' => 'Julio Díaz Torre 203, Cd Industrial',
            'ciudad' => 'Aguascalientes',
            'telefono' => '449 971 1962',
            'fax' => '449 971 1962',
            'correo' => 'julio.lima@pepsico.com',
            'created_at' => '2019-04-16',
            'updated_at' => '2019-04-16',
        ]);
        DB::table($this->table)->insert([
            'nombre' => 'Coca-Cola',
            'direccion' => 'México 45 5, 20920 Centro',
            'ciudad' => 'Aguascalientes',
            'telefono' => '449 209 9661',
            'fax' => '449 209 9661',
            'correo' => 'coca@hotmail.com',
            'created_at' => '2019-04-16',
            'updated_at' => '2019-04-16',
        ]);
        DB::table($this->table)->insert([
            'nombre' => 'Gamesa',
            'direccion' => 'Planta Aguascalientes, Aguascalientes',
            'ciudad' => 'Aguascalientes',
            'telefono' => '449 971 1025',
            'fax' => '449 971 1025',
            'correo' => 'gamesa@hotmail.com',
            'created_at' => '2019-04-16',
            'updated_at' => '2019-04-16',
        ]);
        DB::table($this->table)->insert([
            'nombre' => 'Leche San Marcos',
            'direccion' => 's n, Aguascalientes-Pabellón de Arteaga',
            'ciudad' => 'Aguascalientes',
            'telefono' => '449 910 8300',
            'fax' => '449 910 8300',
            'correo' => 'sanmarcos@hotmail.com',
            'created_at' => '2019-04-16',
            'updated_at' => '2019-04-16',
        ]);
        
    }
}
