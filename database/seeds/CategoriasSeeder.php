<?php

use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    protected $table;

    public function __construct()
    {
        $this->table = 'categorias';
    }
    public function run()
    {
        DB::table($this->table)->delete();
        DB::table($this->table)->insert([
            'nombre' => 'Lacteos',
            'created_at' => '2019-04-16',
            'updated_at' => '2019-04-16',
        ]);
        DB::table($this->table)->insert([
            'nombre' => 'Botana',
            'created_at' => '2019-04-16',
            'updated_at' => '2019-04-16',
        ]);
        DB::table($this->table)->insert([
            'nombre' => 'Bebidas',
            'created_at' => '2019-04-16',
            'updated_at' => '2019-04-16',
        ]);
        DB::table($this->table)->insert([
            'nombre' => 'Postre',
            'created_at' => '2019-04-16',
            'updated_at' => '2019-04-16',
        ]);
    }
}
