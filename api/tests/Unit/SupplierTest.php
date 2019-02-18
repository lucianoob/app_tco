<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use App\Supplier;
use App\Company;

class SupplierTest extends TestCase
{

    public function testSupplierStore()
    {
        $company = Company::get()->random(1)->first();
        $supplier = factory(Supplier::class)->make(["company_id" => $company->id])->toArray();
        $response = $this->json('POST', '/api/supplier/', $supplier)
            ->assertResponseStatus('201')
            ->seeJsonStructure([
                 'id',
            ]);
    }

    public function testSupplierIndex()
    {
        $this->json('GET', '/api/supplier', [])
        	->assertResponseOk()
            ->seeJsonStructure([
                 '*' => [
                     'id',
                 ],
             ]);
    }

    public function testSupplierShow()
    {
        $supplier = Supplier::inRandomOrder()->first();
        $this->json('GET', '/api/supplier/'.$supplier->id, [])
        	->assertResponseOk()
            ->seeJsonStructure([
                 'id',
            ]);
    }

    public function testSupplierUpdate()
    {
    	$rand_supplier = Supplier::inRandomOrder()->first();
        $supplier = factory(Supplier::class)->make(["user_id" => $rand_supplier->user_id])->toArray();

        $this->json('PUT', '/api/supplier/'.$rand_supplier->id, $supplier)
        ->assertResponseOk();
    }

    public function testSupplierDelete()
    {
    	$rand_supplier = Supplier::inRandomOrder()->first();

        $this->json('DELETE', '/api/supplier/'.$rand_supplier->id)
        ->assertResponseOk();
    }
}
