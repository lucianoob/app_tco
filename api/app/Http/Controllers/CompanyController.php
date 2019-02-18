<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Company;

class CompanyController extends Controller
{
    public function index() 
    {
        $companies = DB::table('companies')
                        ->join('users', 'users.id', '=', 'companies.user_id')
                        ->select('users.name as user', 'companies.*')
                        ->get();
        return $companies;
    }

    public function user($id)
    {
        $companies = Company::where('user_id', $id)->get()-first();
        return $companies;
    }

    public function show(Company $company) 
    {
        return $company;
    } 
}
