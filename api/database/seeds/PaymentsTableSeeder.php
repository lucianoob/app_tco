<?php

use Illuminate\Database\Seeder;
use App\Supplier;
use App\Payment;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $suppliers = Supplier::limit(4)->get();
        foreach ($suppliers as $supplier) 
        {
            factory(Payment::class, 4)->create(["supplier_id" => $supplier->id]);
        }
    }
}
