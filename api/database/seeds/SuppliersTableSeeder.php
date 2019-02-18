<?php

use Illuminate\Database\Seeder;
use App\Company;
use App\Supplier;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = Company::limit(2)->get();
        foreach ($companies as $company) 
        {
            factory(Supplier::class, 2)->create(["company_id" => $company->id]);
        }
    }
}
