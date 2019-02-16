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
        //$test = DB::table('suppliers')->where('company_id', 1)->exists();
        //if(!$test)
        //{
        $companies = Company::limit(2)->get();
        foreach ($companies as $company) 
        {
            factory(Supplier::class, 2)->create(["company_id" => $company->id]);
        }
//            DB::table('suppliers')->insert([
//                'id' => 1,
//                'company_id' => 1,
//                'name' => str_random(10),
//                'phone' => sprintf('(%02d) %04d-%04d', rand(11, 99), rand(0, 9999), rand(0, 9999)),
//            ]);
//
//            DB::table('suppliers')->insert([
//                'id' => 2,
//                'company_id' => 1,
//                'name' => str_random(10),
//                'phone' => sprintf('(%02d) %04d-%04d', rand(11, 99), rand(0, 9999), rand(0, 9999)),
//            ]);
//
//            DB::table('suppliers')->insert([
//                'id' => 3,
//                'company_id' => 2,
//                'name' => str_random(10),
//                'phone' => sprintf('(%02d) %04d-%04d', rand(11, 99), rand(0, 9999), rand(0, 9999)),
//            ]);
//
//            DB::table('suppliers')->insert([
//                'id' => 4,
//                'company_id' => 2,
//                'name' => str_random(10),
//                'phone' => sprintf('(%02d) %04d-%04d', rand(11, 99), rand(0, 9999), rand(0, 9999)),
//            ]);
       // }
    }
}
