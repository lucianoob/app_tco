<?php

use Tests\TestCase;

class LoginTest extends TestCase
{   
    public function testWelcomeToLogin()
    {
        $this->visit('/')
             ->click('Login')
             ->seePageIs('/login');
    }

    public function testLogin()
    {
        $this->visit('/login')
            ->type('master', 'email')
            ->type('Master#2019', 'password')
            ->press('btnLogin')
            ->seePageIs('/home');
    }
}
