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

        $user = new User();
        $user->name = 'Tutor';
        $user->Nombre = 'Tutor';
        $user->email = 'tutor@example.com';
        $user->password = bcrypt('tutor');
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->name = 'Administrador';
        $user->Nombre = 'Administrador';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('admin');
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
