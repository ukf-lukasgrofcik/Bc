<?php

namespace Database\Seeders\Dummy;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesSeeder extends Seeder
{

    private $companiesCount = 5;
    private $employeesPerCompany = 5;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(app()->isProduction()) return;

        for($i = 1; $i <= $this->companiesCount; $i++){
            $company_id = DB::table('companies')->insertGetId([
                'name' => "Spoločnosť $i s.r.o.",
                'address' => "Ulica $i, Mesto 000 00",
                'email' => "company$i@mail.com",
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ]);

            for($j = 1; $j <= $this->employeesPerCompany; $j++){
                DB::table('users')->insert([
                    'name' => $j == 1 ? "Majiteľ " : "Zamestnanec ",
                    'surname' => $j == 1 ? "firmy" : ($j-1),
                    'email' => $j == 1 ? "owner.company$i@mail.com" : "employee$j.company$i@mail.com",
                    'password' => bcrypt('heslo'),
                    'role' => $j == 1 ? "owner" : "employee",
                    'company_id' => $company_id,
                    'email_verified_at' => now()->format('Y-m-d H:i:s'),
                    'created_at' => now()->format('Y-m-d H:i:s'),
                    'updated_at' => now()->format('Y-m-d H:i:s'),
                ]);
            }
        }

        foreach(User::role('owner')->get() as $owner){
            $company = $owner->company;
            $company->owner_id = $owner->id;
            $company->save();
        }

    }

}
