<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::query()->create([
        //     "username" => "Muhtarr",
        //     "email" => "artur@gmail.com",
        //     "password" => Hash::make("qwerty123"),
        //     "role" => "admin"
        // ]);


        User::query()->create([
            "username" => "vazgen",
            "email" => "vazgen@gmail.com",
            "password" => Hash::make("vazgen123")
            
        ]);
    }
}
