<?php

namespace Database\Seeders\Dummy;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsSeeder extends Seeder
{

    private $adminsCount = 5;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(app()->isProduction()) return;

        for($i = 1; $i <= $this->adminsCount; $i++){
            DB::table('users')->insert([
                'name' => "Administrátor ",
                'surname' => "$i",
                'email' => "admin$i@mail.com",
                'password' => bcrypt('heslo'),
                'role' => 'admin',
                'email_verified_at' => now()->format('Y-m-d H:i:s'),
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ]);
        }
    }

}
