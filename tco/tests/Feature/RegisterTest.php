<?php

use Tests\TestCase;

class RegisterTest extends TestCase
{
    public function testWelcomeToRegister()
    {
        $this->visit('/')
             ->click('lnkRegister')
             ->seePageIs('/register');
    }
    
    public function testRegister()
    {
        $password_rand = str_random(6);
        $this->visit('/register')
             ->type(str_random(5).' '.str_random(8), 'name')
             ->type(str_random(10), 'username')
             ->type(str_random(10).'@gmail.com', 'email')
             ->type($password_rand, 'password')
             ->type($password_rand, 'password_confirmation')
             ->press('btnRegister');
    }
}
