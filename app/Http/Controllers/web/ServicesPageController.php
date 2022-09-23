<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Financing;
use App\Models\MainGoals;
use App\Models\Questions;
use App\Models\ServGoals;
use App\Models\Services;
use App\Models\Volunteered;
use Illuminate\Http\Request;

class ServicesPageController extends Controller
{
    function show($id){
        $all_services = Services::where('is_active', 1)->get();
        $service = Services::where('id', $id)->first();
        $main_goals = MainGoals::where('service_id', $id)->get();
        $goal = ServGoals::where('service_id', $id)->first();
        $financing = Financing::where('service_id', $id)->first();
        $volunteered = Volunteered::where('service_id', $id)->first();
        $questions = Questions::where('service_id', $id)->first();

        return view('web.services',[
            'all_services' => $all_services ,
            'service'  => $service,
            'main_goals'  => $main_goals,
            'goal'  => $goal,
            'financing'  => $financing,
            'volunteered'  => $volunteered,
            'questions'  => $questions,
        ]);

    }
}
