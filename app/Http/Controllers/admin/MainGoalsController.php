<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Enum\CRUDMessages;
use App\Http\Requests\MainGoalsRequest;
use App\Models\MainGoals;
use Illuminate\Http\Request;

class MainGoalsController extends Controller
{
    public function show($id)
    {
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $main_goal = isset($_GET['Id']) ? $main_goal = MainGoals::where('id',$_GET['Id'])->first():'all';
        $main_goals = MainGoals::where('service_id' , $id)->orderBy('id', 'DESC')->get();

        return view('admin.main_goals', [
            'main_goals'  => $main_goals,
            'do'          => $do,
            'main_goal'   => $main_goal,
            'service_id'  => $id
        ]);
    }

    public function add(MainGoalsRequest $request)
    {
        $request->validated();

            MainGoals::create([
            'name'      => [
                'ar'    => $request->nameAr,
                'en'    => $request->nameEn
            ],
            'description'      => [
                'ar'    => $request->descriptionAr,
                'en'    => $request->descriptionEn
            ],
            'service_id' =>  $request->service_id,
            'is_active' =>  $request->is_active
            ]);

        return redirect()->route('main_goals',$request->service_id)->with([
            'success'   => CRUDMessages::MESSAGE_ADD_SUCCESS,
        ]);
    }

    public function update(MainGoalsRequest $request, $id){
        // return $request;
        $request->validated();

            MainGoals::find($id)->update([
                'name'      => [
                    'ar'    => $request->nameAr,
                    'en'    => $request->nameEn
                ],
                'description'      => [
                    'ar'    => $request->descriptionAr,
                    'en'    => $request->descriptionEn
                ],
                'service_id' =>  $request->service_id,
                'is_active' =>  $request->is_active
            ]);

        return redirect()->route('main_goals',$request->service_id)->with([
            'success'   => CRUDMessages::MESSAGE_UPDATE_SUCCESS,
        ]);
    }

    public function active($id){
        $main_goals=MainGoals::find($id);
        if($main_goals->is_active )
            $main_goals->is_active=0;
        else 
            $main_goals->is_active=1;
        if($main_goals->save())
        return redirect()->back()->with([
            'success'   => CRUDMessages::MESSAGE_ACTIVE_SUCCESS,
        ]);
    }

    public function delete($id){
        $main_goals=MainGoals::find($id);
        if ($main_goals->delete())
        return redirect()->back()->with([
            'success'   => CRUDMessages::MESSAGE_DELETE_SUCCESS,
        ]);
    }
}
