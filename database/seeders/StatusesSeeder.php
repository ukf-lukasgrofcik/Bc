<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = $this->seeds();

        foreach ($seeds as $seed)
            if(! DB::table('statuses')->where('slug', $seed['slug'])->exists())
                DB::table('statuses')->insert($seed);
    }

    private function seeds(){
        return [
            [
                'name' => 'Vytvorená',
                'slug' => 'created',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Schválená',
                'slug' => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dokončená',
                'slug' => 'finished',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
    }

}
