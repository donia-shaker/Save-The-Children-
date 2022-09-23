<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\Services;
use Illuminate\Http\Request;

class SuccessStoryController extends Controller
{
    function showSuccessStoryPage(){
        $all_services = Services::where('is_active', 1)->get();
        return view('web.story',[
            'all_services' => $all_services ,

        ]);
    }
}
