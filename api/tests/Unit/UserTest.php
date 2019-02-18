<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use App\User;

class UserTest extends TestCase
{
    public function testUserIndex()
    {
        $this->json('GET', '/api/user', [])
        	->assertResponseOk()
            ->seeJsonStructure([
                 '*' => [
                     'id',
                 ],
             ]);
    }

    public function testUserShow()
    {
        $user = User::inRandomOrder()->first();
        $this->json('GET', '/api/user/'.$user->id, [])
        	->assertResponseOk()
            ->seeJsonStructure([
                 'id',
            ]);
    }
}
