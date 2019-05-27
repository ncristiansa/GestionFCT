<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'Tutor')->first();
        $role_admin = Role::where('name', 'Administrador')->first();
        $role_alumn = Role::where('name', 'Alumno')->first();

        $user = new User();
        $user->name = 'Tutor';
        $user->Nombre = 'Tutor';
        $user->email = 'tutor@example.com';
        $user->password = bcrypt('tuY0r');
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->name = 'Administrador';
        $user->Nombre = 'Administrador';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('@dministrad0r');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Alumno';
        $user->Nombre = 'Alumno';
        $user->email = 'alumno@example.com';
        $user->password = bcrypt('@lumn0');
        $user->save();
        $user->roles()->attach($role_user);
    }
}
