<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EloquentSeeder extends Seeder
{

    protected $table;
    protected $runInProduction = 0;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!$this->runInProduction && !app()->isProduction()) return;

        $seeds = $this->seeds();

        foreach ($seeds as $seed)
            if(!$this->exists($seed))
                $this->insert($seed);
    }

    private function exists($seed, $column = 'email'){
        DB::table($this->table)
            ->where($column, $seed[$column])
            ->exists();
    }

    private function insert($seed){
        DB::table($this->table)
            ->insert($seed);
    }

    protected function seeds(){
        return [];
    }

}
