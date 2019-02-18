<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Payment;

class PaymentController extends Controller
{
    public function index() 
    {
        $payments = DB::table('payments')
                        ->join('suppliers', 'suppliers.id', '=', 'payments.supplier_id')
                        ->select('suppliers.name as supplier', 'payments.*')
                        ->get();
        return $payments;
    }

    public function company($id)
    {
        $payments = DB::table('payments')
                        ->join('suppliers', 'suppliers.id', '=', 'payments.supplier_id')
                        ->select('suppliers.name as supplier', 'payments.*')
                        ->where('suppliers.company_id', $id)->get();
        return $payments;
    }

    public function show(Payment $payment) 
    {
        return $payment;
    } 

    public function store(Request $request)
    {
        return Payment::create($request->all());
    } 

    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->update($request->all());

        return $payment;
    }

    public function destroy(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return 204;
    }
}
