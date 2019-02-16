<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Company;

class CompanyController extends Controller
{
    public function __construct()
    {
        
    }

    public function edit()
    {   
        $company = User::find(Auth::user()->id)->company;
        return view('companies.edit')->with('company', $company);
    }

    public function update(Company $company)
    { 
        $company->name = request('name');
        $company->cnpj = request('cnpj');
        $company->email = request('email');
        $company->phone = request('phone');
        $company->cep = request('cep');
        $company->address = request('address');

        $company->save();

        return view('companies.edit')->with('company', $company)->with('status', 'Os dados da empresa foram salvos com sucesso.');
    }
}
