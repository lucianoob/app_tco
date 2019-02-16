<?php

use Illuminate\Database\Seeder;
use App\Company;
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
        $users = User::limit(3)->get();
        foreach ($users as $user) 
        {
            if($user->username != "master") {
                factory(Company::class, 1)->create(["user_id" => $user->id]);
            }
        }
    }
}
