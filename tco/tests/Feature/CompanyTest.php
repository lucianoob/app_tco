<?php

use Tests\TestCase;

class CompanyTest extends TestCase
{   
    public function testAdmin()
    {
        $this->visit('/login')
            ->type('master', 'email')
            ->type('Master#2019', 'password')
            ->press('btnLogin')
            ->seePageIs('/home')
            ->click('lnkCompanies')
            ->seePageIs('/companies/all');
    }
}
