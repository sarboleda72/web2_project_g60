<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User;
        $user->name = "Santiago";
        $user->lastname = "Arboleda";
        $user->phone = "3131313131";
        $user->address = "Versalles 170003";
        $user->email = "santiago@uam.com";
        $user->password = bcrypt("santiago");
        $user->role = "admin";
        $user->save();
    }
}
