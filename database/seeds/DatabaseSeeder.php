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
        // $this->call(UsersTableSeeder::class);

        // La creación de datos de roles debe ejecutarse primero
        $this->call(RoleTableSeeder::class);

        // Los usuarios necesitarán los roles previamente generados
        $this->call(UserTableSeeder::class);
        //Festivos
        DB::table('festivos')->insert([
            ['Fecha' => '2019-1-1', 'Descripcion' => 'Año nuevo', 'Tipo' => 'festivo'],
            ['Fecha' => '2019-4-19', 'Descripcion' => 'Viernes Santo', 'Tipo' =>'festivo'],
            ['Fecha' => '2019-4-22', 'Descripcion' => 'Lunes de Pascua', 'Tipo' =>'festivo'],
            ['Fecha' => '2019-5-1', 'Descripcion' => 'Día del trabajador', 'Tipo' =>'festivo'],
            ['Fecha' => '2019-6-24', 'Descripcion' => 'San Joan', 'Tipo' =>'festivo'],
            ['Fecha' => '2019-9-11', 'Descripcion' => 'Diada Nacional de Cataluña', 'Tipo' =>'festivo'],
            ['Fecha' => '2019-10-12', 'Descripcion' => 'Fiesta Nacional de España', 'Tipo' =>'festivo'],
            ['Fecha' => '2019-11-1', 'Descripcion' => 'Todos los Santos', 'Tipo' =>'festivo'],
            ['Fecha' => '2019-12-6', 'Descripcion' => 'Día de Constitución', 'Tipo' =>'festivo'],
            ['Fecha' => '2019-12-25', 'Descripcion' => 'Navidad', 'Tipo' =>'festivo'],
            ['Fecha' => '2019-12-26', 'Descripcion' => 'Sant Esteve', 'Tipo' =>'festivo'],
            ['Fecha' => '2019-6-10', 'Descripcion' => 'Fiesta Local', 'Tipo' =>'local'],
            ['Fecha' => '2019-6-21', 'Descripcion' => 'Fiesta Local', 'Tipo' =>'local'],
            ['Fecha' => '2019-12-25', 'Descripcion' => 'Natividad del Señor', 'Tipo' =>'local'],
            ['Fecha' => '2019-4-15', 'Descripcion' => 'Vacaciones de Semana Santa', 'Tipo' =>'escolar'],
            ['Fecha' => '2019-6-21', 'Descripcion' => 'Fin clases', 'Tipo' =>'escolar'],

        ]);
    }
}
