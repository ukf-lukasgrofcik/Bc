<?php

namespace Database\Seeders\Dummy;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsSeeder extends Seeder
{

    private $studentsCount = 20;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(app()->isProduction()) return;

        for($i = 1; $i <= $this->studentsCount; $i++){
            DB::table('users')->insert([
                'name' => "Študent ",
                'surname' => "$i",
                'email' => "student$i@mail.com",
                'password' => bcrypt('heslo'),
                'role' => 'student',
                'email_verified_at' => now()->format('Y-m-d H:i:s'),
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ]);
        }
    }

}
