<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;

class CompaniesPageController extends Controller
{
    function showCompaniesPage(){
        $all_services = Services::where('is_active', 1)->get();
        return view('web.companies',[
            'all_services' => $all_services ,
        ]);
    }
}
