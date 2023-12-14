<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();
        User::create([
            'username'=> 'user1',
            'password'=> Hash::make('123456'),
            'role' => 'user',
            'remember_token' => str_random(10),
        ]);
        User::create([
            'username'=> 'user2',
            'password'=> Hash::make('123456'),
            'role' => 'user',
            'remember_token' => str_random(10),
        ]);
        User::create([
            'username'=> 'penanggung_jawab1',
            'password'=> Hash::make('123456'),
            'role' => 'penanggung_jawab',
            'remember_token' => str_random(10),
        ]);
        User::create([
            'username'=> 'penanggung_jawab2',
            'password'=> Hash::make('123456'),
            'role' => 'penanggung_jawab',
            'remember_token' => str_random(10),
        ]);
    }
}
