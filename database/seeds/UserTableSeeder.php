<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        $admin = new User;
        $admin->name = 'Admin';
        $admin->email = 'admin@cms.nl';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach(Role::where('name', 'admin')->first());

        $user = new User;
        $user->name = 'User';
        $user->email = 'user@cms.nl';
        $user->password = bcrypt('user');
        $user->save();
        $user->roles()->attach(Role::where('name', 'user')->first());

        $user = new User;
        $user->name = 'Youp Koopmans';
        $user->email = 'youp@cms.nl';
        $user->password = bcrypt('youpkoopmans');
        $user->save();
        $user->roles()->attach(Role::where('name', 'user')->first());
    }
}
