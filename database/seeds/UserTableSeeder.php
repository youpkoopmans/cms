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
        $user = new User;
        $user->name = 'Youp User';
        $user->email = 'youp@user.nl';
        $user->password = bcrypt('user1234');
        $user->save();
        $user->roles()->attach(Role::where('name', 'user')->first());

        $admin = new User;
        $admin->name = 'Youp Admin';
        $admin->email = 'youp@admin.nl';
        $admin->password = bcrypt('admin1234');
        $admin->save();
        $admin->roles()->attach(Role::where('name', 'admin')->first());
    }
}
