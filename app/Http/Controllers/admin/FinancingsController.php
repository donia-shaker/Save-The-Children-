<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Enum\CRUDMessages;
use App\Http\Requests\FinancingsRequest;
use App\Models\Financing;
use App\Models\Services;
use Illuminate\Http\Request;

class FinancingsController extends Controller
{
    public function show()
    {
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $financing = isset($_GET['Id']) ? $financing = Financing::where('id',$_GET['Id'])->first():'all';
        $financings = Financing::with('service')->orderBy('id', 'DESC')->get();
        $services = Services::get();
        return view('admin.financings', [
            'financings' => $financings,
            'do'        => $do,
            'financing'   => $financing,
            'services'   => $services,
        ]);
    }

    public function add(FinancingsRequest $request)
    {
        $request->validated();

            Financing::create([
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

        return redirect()->route('financings')->with([
            'success'   => CRUDMessages::MESSAGE_ADD_SUCCESS,
        ]);
    }

    public function update(FinancingsRequest $request, $id){
        // return $request;
        $request->validated();

            Financing::find($id)->update([
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

        return redirect()->route('financings')->with([
            'success'   => CRUDMessages::MESSAGE_UPDATE_SUCCESS,
        ]);
    }

    public function active($id){
        $financings=Financing::find($id);
        if($financings->is_active )
            $financings->is_active=0;
        else 
            $financings->is_active=1;
        if($financings->save())
        return redirect()->back()->with([
            'success'   => CRUDMessages::MESSAGE_ACTIVE_SUCCESS,
        ]);
    }

    public function delete($id){
        $financings=Financing::find($id);
        if ($financings->delete())
        return redirect()->back()->with([
            'success'   => CRUDMessages::MESSAGE_DELETE_SUCCESS,
        ]);
    }
}
