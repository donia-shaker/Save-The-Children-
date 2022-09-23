<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\ContactUs;
use App\Models\Services;
use App\Models\social_media;
use Illuminate\Http\Request;

class ContactUsPageController extends Controller
{
    function showContactUsPage(){
        $all_services = Services::where('is_active', 1)->get();

        return view('web.contact_us',[
            'all_services' => $all_services ,
        ]);
    }
}
