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
        $this->call(EmpleadoSeeder::class);
        $this->call(UsuarioSeeder::class);

       //factory('App\Usuario', 5)->create();
        //factory('App\CalendarioAtencion')->create();


       /* factory(App\User::class, 50)->create()->each(function ($user) {
            $user->posts()->save(factory(App\Post::class)->make());
        });
*/
   //     factory('App\Usuario', 5)->create();
    //    factory('App\CalendarioAtencion')->create();
/**
        factory(App\Usuario::class, 2)->create()->each(function ($user) {
            $user->calendarioAtenciones()->saveMany(factory(App\CalendarioAtencion::class, 2)->make());
        });


         factory($usuario, 2)->create()->each(function ($user) {
         $user->$CA()->saveMany(factory($CA, 2)->make())
         });
*/


    }
}
/**
 *
 *
 *
 *
 * factory($usuario, 2)->create()->each(function ($user) {
 * $user->$CA()->saveMany(factory($CA, 2)->make())
 * });
 */
