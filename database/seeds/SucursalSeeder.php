<?php

use Illuminate\Database\Seeder;

class SucursalSeeder extends Seeder
{
    protected $table;

    public function __construct()
    {
        $this->table = 'sucursal';
    }
    public function run()
    {
        DB::table($this->table)->delete();
        DB::table($this->table)->insert([
            'nombre' => 'Abarrotes El Mike',
            'direccion' => 'Villas de nuesta señora de la asunción',
            'telefono' => '4494064398',
            'created_at' => '2019-05-08',
            'updated_at' => '2019-05-08',
        ]);
        
        DB::table($this->table)->insert([
            'nombre' => 'Minisuper La joya',
            'direccion' => 'Santa anita',
            'telefono' => '4494067396',
            'created_at' => '2019-05-08',
            'updated_at' => '2019-05-08',
        ]);
      
        DB::table($this->table)->insert([
            'nombre' => 'Minisuper El vago',
            'direccion' => 'Luis hidalgo monroy',
            'telefono' => '4494067393',
            'created_at' => '2019-05-08',
            'updated_at' => '2019-05-08',
        ]);
    
        DB::table($this->table)->insert([
            'nombre' => 'Abarrotes El tony',
            'direccion' => 'Pilar blanco',
            'telefono' => '4497067396',
            'created_at' => '2019-05-08',
            'updated_at' => '2019-05-08',
        ]);
        
        DB::table($this->table)->insert([
            'nombre' => 'Abarrotes El marco',
            'direccion' => 'La soledad',
            'telefono' => '4494067343',
            'created_at' => '2019-05-08',
            'updated_at' => '2019-05-08',
        ]);
  
        DB::table($this->table)->insert([
            'nombre' => 'Minisuper La niña',
            'direccion' => 'Juan montoro',
            'telefono' => '4496087394',
            'created_at' => '2019-05-08',
            'updated_at' => '2019-05-08',
        ]);
    }
}
