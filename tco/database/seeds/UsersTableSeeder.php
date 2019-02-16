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
        $user1 = DB::table('users')->where('username', 'user1')->exists();
        if(!$user1)
        {
            User::create([
                'id'    => 1,
                'name'    => 'User1',
                'username'    => 'user1',
                'email'    => 'user1@test.com',
                'password'   =>  Hash::make('User1#2019'),
                'remember_token' =>  str_random(10),
                'token' =>  null,
                'active' =>  1,
            ]);
        }
        $user2 = DB::table('users')->where('username', 'user2')->exists();
        if(!$user2)
        {
            User::create([
                'id'    => 2,
                'name'    => 'User2',
                'username'    => 'user2',
                'email'    => 'user2@test.com',
                'password'   =>  Hash::make('User2#2019'),
                'remember_token' =>  str_random(10),
                'token' =>  null,
                'active' =>  1,
            ]);
        }
    }
}
