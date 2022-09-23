<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\services;
use Illuminate\Http\Request;

class ManagersPageController extends Controller
{
    function show(){
        $all_services = Services::where('is_active', 1)->get();
        $services = services::select()->orderBy('id', 'DESC')->get();
        return view('web.mangers',[
            'all_services' => $all_services,
            'services'  => $services,

        ]);
    }
}
