<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
class companyController extends Controller
{
    public function index(){
        $companies=Company::all();
        return view('company',compact('companies'));
    }
}
