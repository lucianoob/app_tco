<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Supplier;

class SupplierController extends Controller
{
    public function index() 
    {
        $suppliers = DB::table('suppliers')
                        ->join('companies', 'companies.id', '=', 'suppliers.company_id')
                        ->select('companies.name as company', 'suppliers.*')
                        ->get();
        return $suppliers;
    }

    public function company($id)
    {
        $suppliers = Supplier::where('company_id', $id)->get();
        for($i=0; $i<count($suppliers); $i++) {
            $supplier = $suppliers[$i];
            if($supplier->active == 1) {
                $supplier->active = 'Sim';
            } else {
                $supplier->active = 'Não';
            }
            $suppliers[$i] = $supplier;
        }
        return $suppliers;
    }

    public function show(Supplier $supplier) 
    {
        return $supplier;
    } 

    public function store(Request $request)
    {
        $supplier = new Supplier();
        $supplier->company_id = $request["company_id"];
        $supplier->name = $request["name"];
        $supplier->phone = $request["phone"];
        $supplier->email = $request["email"];
        $supplier->token = str_random(40) . time();
        $supplier->save();

        return $supplier;
    } 

    public function update(Request $request, $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->all());

        return $supplier;
    }

    public function destroy(Request $request, $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return 204;
    }
}
