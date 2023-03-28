<?php

use App\User;
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
        $user = User::create([
            'name' => 'Julio Vásquez',
            'email' => 'jvasquez@outlook.com',
            'password' => Hash::make('password')
        ]);
        $user->save();
        factory(User::class, 10)->create();
    }
}
