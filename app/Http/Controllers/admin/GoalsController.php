<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Enum\CRUDMessages;
use App\Http\Requests\GoalsRequest;
use App\Models\ServGoals;
use App\Models\Services;
use Illuminate\Http\Request;

class GoalsController extends Controller
{
    public function show()
    {
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $goal = isset($_GET['Id']) ? $goal = ServGoals::where('id',$_GET['Id'])->first():'all';
        $goals = ServGoals::with('service')->orderBy('id', 'DESC')->get();
        $services = Services::get();
        return view('admin.goals', [
            'goals' => $goals,
            'do'        => $do,
            'goal'   => $goal,
            'services'   => $services,
        ]);
    }

    public function add(GoalsRequest $request)
    {
        $request->validated();

            ServGoals::create([
            'description'      => [
                'ar'    => $request->descriptionAr,
                'en'    => $request->descriptionEn
            ],
            'page_content'     =>  [
                'ar'    => $request->page_contentAr,
                'en'    => $request->page_contentEn
            ],
            'service_id' =>  $request->service_id,
            'is_active' =>  $request->is_active
            ]);

        return redirect()->route('goals')->with([
            'success'   => CRUDMessages::MESSAGE_ADD_SUCCESS,
        ]);
    }

    public function update(GoalsRequest $request, $id){
        // return $request;
        $request->validated();

            ServGoals::find($id)->update([
                'description'      => [
                    'ar'    => $request->descriptionAr,
                    'en'    => $request->descriptionEn
                ],
                'page_content'     =>  [
                    'ar'    => $request->page_contentAr,
                    'en'    => $request->page_contentEn
                ],
                'service_id' =>  $request->service_id,
                'is_active' =>  $request->is_active
                ]);

        return redirect()->route('goals')->with([
            'success'   => CRUDMessages::MESSAGE_UPDATE_SUCCESS,
        ]);
    }

    public function active($id){
        $goals=ServGoals::find($id);
        if($goals->is_active )
            $goals->is_active=0;
        else 
            $goals->is_active=1;
        if($goals->save())
        return redirect()->back()->with([
            'success'   => CRUDMessages::MESSAGE_ACTIVE_SUCCESS,
        ]);
    }

    public function delete($id){
        $goals=ServGoals::find($id);
        if ($goals->delete())
        return redirect()->back()->with([
            'success'   => CRUDMessages::MESSAGE_DELETE_SUCCESS,
        ]);
    }
}
