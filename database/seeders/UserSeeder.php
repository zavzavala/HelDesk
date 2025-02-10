<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */			

    public function run()
    {
        \DB::table('users')->delete();
        \DB::table('users')->insert([
            'name' => 'administrador',
            'email' => 'admin@gmail.com',
            'role' => 1,
            'departamento' => 'TICS',
            'favoriteColor' => 'verde',
            'password' => Hash::make('$Satela12'),
            'remember_token' => Str::random(10)

        ]);
    }
}
