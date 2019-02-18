<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\SupplierActivate;
use App\Supplier;

class SupplierController extends Controller
{
	public function view() {
        return view('admin.suppliers');
    }
    
    public function list() {
        return view('suppliers');
    }

    public function edit(Request $request){
        return view('suppliers');
    }

    public function notification($id) {
    	$supplier = Supplier::findOrFail($id);

    	$supplier->notify(new SupplierActivate($supplier));
    }

    public function activate($token = null)
    {
        $supplier = Supplier::where('token', $token)->first();

        if (empty($supplier)) {
            return redirect()->to('/')->with('error', 'Seu código de ativação expirou ou é inválido.');
        }

        if(!$supplier->update(['token' => null, 'active' => Supplier::ACTIVE])) {
        	return redirect()->to('/')->with('error', 'Erro na ativação do seu cadastro.');	
        }

        return redirect()->to('/')->with('status', 'Parabéns '.$supplier->name.'! seu cadastro foi ativado com sucesso.');
    }
}