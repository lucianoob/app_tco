<?php

namespace App\Http\Controllers;

use App\User;
use App\Company;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class SupplierController extends Controller
{
    public function __construct()
    {
        
    }

    public function list()
    {   
        $company = User::find(Auth::user()->id)->company;
        $suppliers = Supplier::where('company_id', $company->id)->get();
        return view('suppliers.list')->with('suppliers', $suppliers);
    }

    public function new()
    {   
        return view('suppliers.new');
    }

    public function edit($id)
    {   
    	$supplier = Supplier::find($id);
        return view('suppliers.edit')->with('supplier', $supplier);
    }

    public function save($id)
    {
    	$company = User::find(Auth::user()->id)->company;

    	if(empty($id)) 
    	{
	        $supplier = new Supplier();
	        $supplier->company_id = $company->id;
	        $supplier->name = Input::post('name');
	        $supplier->phone = Input::post('phone');
	        $supplier->save();

	        $message = "Fornecedor inserido com sucesso!!!";
	        return redirect('/suppliers/list/')->with('mensagem', $message);
    	} else {
    		$supplier = Supplier::find($id);
    		$supplier->name = Input::post('name');
	        $supplier->phone = Input::post('phone');
	        $supplier->save();

	        $message = "Fornecedor alterado com sucesso!!!";
	        return redirect('/suppliers/list/')->with('message', $message);
    	}
    }

    public function remove($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();

        $message = "Fornecedor excluído com sucesso!";
        return redirect('/suppliers/list/')->with('message', $message);
    }
}
