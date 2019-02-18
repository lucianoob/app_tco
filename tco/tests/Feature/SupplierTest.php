<?php

use Tests\TestCase;

class SupplierTest extends TestCase
{   
    public function testAdmin()
    {
        $this->visit('/login')
            ->type('master', 'email')
            ->type('Master#2019', 'password')
            ->press('btnLogin')
            ->seePageIs('/home')
            ->click('lnkSuppliers')
            ->seePageIs('/suppliers/all');
    }
}
