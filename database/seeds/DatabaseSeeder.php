<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Cliente', 5)->create();
        $this->call(EmpleadoSeeder::class);
        $this->call(UsuarioSeeder::class);

    }
}
