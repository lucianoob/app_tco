<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Supplier;

class PaymentController extends Controller
{
	public function view() {
        return view('admin.payments');
    }
    
    public function list() {
    	$suppliers = Supplier::where("company_id", Auth::user()->company->id)->get();
        return view('payments')->with('suppliers', $suppliers);
    }

    public function edit(Request $request){
        return view('payments');
    }
}