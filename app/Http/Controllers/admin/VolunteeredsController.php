<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Enum\CRUDMessages;
use App\Http\Requests\VolunteeredsRequest;
use App\Models\Services;
use App\Models\Volunteered;
use Illuminate\Http\Request;

class VolunteeredsController extends Controller
{
    public function show()
    {
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $volunteered = isset($_GET['Id']) ? $volunteered = Volunteered::where('id',$_GET['Id'])->first():'all';
        $volunteereds = Volunteered::with('service')->orderBy('id', 'DESC')->get();
        $services = Services::get();
        return view('admin.volunteereds', [
            'volunteereds' => $volunteereds,
            'do'        => $do,
            'volunteered'   => $volunteered,
            'services'   => $services,
        ]);
    }

    public function add(VolunteeredsRequest $request)
    {
        $request->validated();

            Volunteered::create([
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

        return redirect()->route('volunteereds')->with([
            'success'   => CRUDMessages::MESSAGE_ADD_SUCCESS,
        ]);
    }

    public function update(VolunteeredsRequest $request, $id){
        // return $request;
        $request->validated();

            Volunteered::find($id)->update([
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

        return redirect()->route('volunteereds')->with([
            'success'   => CRUDMessages::MESSAGE_UPDATE_SUCCESS,
        ]);
    }

    public function active($id){
        $volunteereds=Volunteered::find($id);
        if($volunteereds->is_active )
            $volunteereds->is_active=0;
        else 
            $volunteereds->is_active=1;
        if($volunteereds->save())
        return redirect()->back()->with([
            'success'   => CRUDMessages::MESSAGE_ACTIVE_SUCCESS,
        ]);
    }

    public function delete($id){
        $volunteereds=Volunteered::find($id);
        if ($volunteereds->delete())
        return redirect()->back()->with([
            'success'   => CRUDMessages::MESSAGE_DELETE_SUCCESS,
        ]);
    }
}
