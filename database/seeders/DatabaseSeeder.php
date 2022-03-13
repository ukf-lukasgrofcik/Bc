<?php

namespace Database\Seeders;

use Database\Seeders\Dummy\AdminsSeeder;
use Database\Seeders\Dummy\CompaniesSeeder;
use Database\Seeders\Dummy\StudentsSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(StatusesSeeder::class);
    }
}
