<?php

namespace Database\Seeders;

class AdminSeeder extends EloquentSeeder
{

    protected $table = 'users';
    protected $runInProduction = 1;

    protected function seeds(){
        return [
            [
                'name' => 'John',
                'surname' => 'Doe',
                'email' => 'admin',
                'password' => bcrypt('admin'),
                'role' => 'admin',
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
                'remember_token' => null,
            ],
        ];
    }

}
