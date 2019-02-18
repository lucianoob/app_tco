<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use App\Company;

class CompanyTest extends TestCase
{
    public function testCompanyIndex()
    {
        $this->json('GET', '/api/company', [])
        	->assertResponseOk()
            ->seeJsonStructure([
                 '*' => [
                     'id',
                 ],
             ]);
    }

    public function testCompanyShow()
    {
        $company = Company::inRandomOrder()->first();
        $this->json('GET', '/api/company/'.$company->id, [])
        	->assertResponseOk()
            ->seeJsonStructure([
                 'id',
            ]);
    }
}
