<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function showHomePage(){
        $all_services = Services::where('is_active', 1)->get();

        return view('web.homePage',[
            'all_services' => $all_services ,

        ]);
    }
}
