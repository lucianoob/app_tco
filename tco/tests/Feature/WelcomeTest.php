<?php

use Tests\TestCase;

class WelcomeTest extends TestCase
{
    public function testWelcome()
    {
        $this->visit('/')
             ->see('AppTCO');
    }
}
