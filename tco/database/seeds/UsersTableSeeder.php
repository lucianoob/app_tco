<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UsersTableSeeder extends Seeder
{
   /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $master = DB::table('users')->where('username', 'master')->exists();
        if(!$master)
        {
            User::create([
                'name'    => 'Master',
                'username'    => 'master',
                'email'    => 'master@test.com',
                'password'   =>  Hash::make('Master#2019'),
                'remember_token' =>  str_random(10),
                'token' =>  null,
                'active' =>  1,
                'admin' =>  1,
            ]);
        }
        
        factory(App\User::class, 2)->create();
    }
}
