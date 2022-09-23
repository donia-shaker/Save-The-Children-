<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Reports;
use App\Models\Services;
use Illuminate\Http\Request;

class ReportsPageController extends Controller
{
    function show(){
        $all_services = Services::where('is_active', 1)->get();
        $reports = Reports::select()->where('is_active', 1)->orderBy('id', 'DESC')->get();
        return view('web.reports',[
            'all_services' => $all_services ,
            'reports'   => $reports
        ]);
    }
}
