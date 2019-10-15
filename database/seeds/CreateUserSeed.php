<?php

use Illuminate\Database\Seeder;

class CreateUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App\User::count() == 0){
            App\User::create([
                'name' => 'Administrador',
                'email' => 'admin@admin',
                'email_verified_at' => now(),
                'password' => bcrypt('159357@#$%')
            ]);
        }
    }
}
