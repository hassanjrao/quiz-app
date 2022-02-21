<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create([
            "name"=>"admin",
            "email"=>"admin@m.com",
            "password"=>bcrypt("password"),
        ]);

        $user->assignRole("admin");



        $user=User::create([
            "name"=>"hassan",
            "email"=>"hassan@m.com",
            "password"=>bcrypt("password"),
        ]);

        $user->assignRole("user");
    }
}
