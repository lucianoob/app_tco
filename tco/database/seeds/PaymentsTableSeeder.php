<?php

use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $test = DB::table('payments')->where('supplier_id', 1)->exists();
        if(!$test)
        {
            DB::table('payments')->insert([
                'description' => str_random(10),
                'payment' => rand(0, 99999) / 100,
                'supplier_id' => 1,
            ]);
            DB::table('payments')->insert([
                'description' => str_random(10),
                'payment' => rand(0, 99999) / 100,
                'supplier_id' => 1,
            ]);
            DB::table('payments')->insert([
                'description' => str_random(10),
                'payment' => rand(0, 99999) / 100,
                'supplier_id' => 1,
            ]);
        }
        $test = DB::table('payments')->where('supplier_id', 2)->exists();
        if(!$test)
        {
            DB::table('payments')->insert([
                'description' => str_random(10),
                'payment' => rand(0, 99999) / 100,
                'supplier_id' => 2,
            ]);
            DB::table('payments')->insert([
                'description' => str_random(10),
                'payment' => rand(0, 99999) / 100,
                'supplier_id' => 2,
            ]);
            DB::table('payments')->insert([
                'description' => str_random(10),
                'payment' => rand(0, 99999) / 100,
                'supplier_id' => 2,
            ]);
        }
        $test = DB::table('payments')->where('supplier_id', 3)->exists();
        if(!$test)
        {
            DB::table('payments')->insert([
                'description' => str_random(10),
                'payment' => rand(0, 99999) / 100,
                'supplier_id' => 3,
            ]);
            DB::table('payments')->insert([
                'description' => str_random(10),
                'payment' => rand(0, 99999) / 100,
                'supplier_id' => 3,
            ]);
            DB::table('payments')->insert([
                'description' => str_random(10),
                'payment' => rand(0, 99999) / 100,
                'supplier_id' => 3,
            ]);
        }
        $test = DB::table('payments')->where('supplier_id', 4)->exists();
        if(!$test)
        {
            DB::table('payments')->insert([
                'description' => str_random(10),
                'payment' => rand(0, 99999) / 100,
                'supplier_id' => 4,
            ]);
            DB::table('payments')->insert([
                'description' => str_random(10),
                'payment' => rand(0, 99999) / 100,
                'supplier_id' => 4,
            ]);
            DB::table('payments')->insert([
                'description' => str_random(10),
                'payment' => rand(0, 99999) / 100,
                'supplier_id' => 4,
            ]);
        }
    }
}
