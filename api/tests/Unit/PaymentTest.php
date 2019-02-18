<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use App\Supplier;
use App\Payment;

class PaymentTest extends TestCase
{

    public function testPaymentStore()
    {
        $supplier = Supplier::get()->random(1)->first();
        $payment = factory(Payment::class)->make(["supplier_id" => $supplier->id])->toArray();
        $response = $this->json('POST', '/api/payment/', $payment)
            ->assertResponseStatus('201')
            ->seeJsonStructure([
                 'id',
            ]);
    }

    public function testPaymentIndex()
    {
        $this->json('GET', '/api/payment', [])
        	->assertResponseOk()
            ->seeJsonStructure([
                 '*' => [
                     'id',
                 ],
             ]);
    }

    public function testPaymentShow()
    {
        $payment = Payment::inRandomOrder()->first();
        $this->json('GET', '/api/payment/'.$payment->id, [])
        	->assertResponseOk()
            ->seeJsonStructure([
                 'id',
            ]);
    }

    public function testPaymentUpdate()
    {
    	$rand_payment = Payment::inRandomOrder()->first();
        $payment = factory(Payment::class)->make(["supplier_id" => $rand_payment->supplier_id])->toArray();

        $this->json('PUT', '/api/payment/'.$rand_payment->id, $payment)
        ->assertResponseOk();
    }

    public function testPaymentDelete()
    {
    	$rand_payment = Payment::inRandomOrder()->first();

        $this->json('DELETE', '/api/payment/'.$rand_payment->id)
        ->assertResponseOk();
    }
}
