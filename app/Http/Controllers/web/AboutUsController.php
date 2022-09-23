<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Services;
use App\Models\website_info;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    function show(){
        $all_services = Services::where('is_active', 1)->get();
        $about_bank = website_info::select()->where('id' ,'<',6)->get();
        $principles = website_info::select()->where('id' ,'>',5)->get();
        return view('web.about_us',[
            'all_services' => $all_services ,
            'about_bank' => $about_bank,
            'principles' => $principles

        ]);
    }
}
