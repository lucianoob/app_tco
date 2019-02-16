<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $test = DB::table('companies')->where('user_id', 1)->exists();
        if(!$test)
        {
            DB::table('companies')->insert([
                'id' => 1,
                'user_id' => 1,
                'name' => str_random(10),
                'cnpj' => sprintf('%03d.%03d.%03d/0001-%02d', rand(0, 999), rand(0, 999), rand(0, 999), rand(0, 99)),
                'email' => str_random(10).'@gmail.com',
                'phone' => sprintf('(%02d) %04d-%04d', rand(11, 99), rand(0, 9999), rand(0, 9999)),
                'cep' => sprintf('%05d-%03d', rand(0, 99999), rand(0, 999)),
                'address' => 'Rua '.str_random(10).sprintf(', %04d', rand(0, 9999)),
            ]);
        }
        $test = DB::table('companies')->where('user_id', 2)->exists();
        if(!$test)
        {
            DB::table('companies')->insert([
                'id' => 2,
                'user_id' => 2,
                'name' => str_random(10),
                'cnpj' => sprintf('%03d.%03d.%03d/0001-%02d', rand(0, 999), rand(0, 999), rand(0, 999), rand(0, 99)),
                'email' => str_random(10).'@gmail.com',
                'phone' => sprintf('(%02d) %04d-%04d', rand(11, 99), rand(0, 9999), rand(0, 9999)),
                'cep' => sprintf('%05d-%03d', rand(0, 99999), rand(0, 999)),
                'address' => 'Rua '.str_random(10).sprintf(', %04d', rand(0, 9999)),
            ]);
        }
    }
}
