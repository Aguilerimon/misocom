<?php

use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->delete();

        DB::table('clientes')->insert([
        	'nombres' => 'Manuel',
        	'direccion' => 'Calle del Sol',
        	'correo' => 'manuel23@gmail.com',
            'contrasena' => '4563fbf',
            'created_at' => '2019-05-07',
            'updated_at' => '2019-05-07',
        ]);

		DB::table('clientes')->insert([
        	'nombres' => 'Juan',
        	'direccion' => 'Calle de la luna',
        	'correo' => 'bernal56@gmail.com',
            'contrasena' => '6373gbh',
            'created_at' => '2019-05-07',
            'updated_at' => '2019-05-07',
        ]);        
    }
}
