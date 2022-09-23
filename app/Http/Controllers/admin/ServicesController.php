<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Enum\CRUDMessages;
use App\Http\Requests\ServicesRequest;
use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function show()
    {
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $service = isset($_GET['Id']) ? $service = Services::where('id',$_GET['Id'])->first():'all';
        $services = Services::orderBy('id', 'DESC')->get();
        return view('admin.services', [
            'services' => $services,
            'do'        => $do,
            'service'   => $service
        ]);
    }

    public function add(ServicesRequest $request)
    {
        $request->validated();

        if($request->hasFile('image'))
            $image=$this->uploadFile($request->file('image'));

            Services::create([
            'name'      => [
                'ar'    => $request->nameAr,
                'en'    => $request->nameEn
            ],
            'background_image'     =>  $image,
            'description'      => [
                'ar'    => $request->descriptionAr,
                'en'    => $request->descriptionEn
            ],
            'sentence'     =>  [
                'ar'    => $request->sentenceAr,
                'en'    => $request->sentenceEn
            ],
            'is_active' =>  $request->is_active
            ]);

        return redirect()->route('services')->with([
            'success'   => CRUDMessages::MESSAGE_ADD_SUCCESS,
        ]);
    }

    public function update(ServicesRequest $request, $id){
        // return $request;
        $request->validated();

        if($request->hasFile('image'))
            $image=$this->uploadFile($request->file('image'));

            Services::find($id)->update([
                'name'      => [
                    'ar'    => $request->nameAr,
                    'en'    => $request->nameEn
                ],
                'background_image'     =>  $image,
                'description'      => [
                    'ar'    => $request->descriptionAr,
                    'en'    => $request->descriptionEn
                ],
                'sentence'     =>  [
                    'ar'    => $request->sentenceAr,
                    'en'    => $request->sentenceEn
                ],
                'is_active' =>  $request->is_active
            ]);

        return redirect()->route('services')->with([
            'success'   => CRUDMessages::MESSAGE_UPDATE_SUCCESS,
        ]);
    }

    public function active($id){
        $services=Services::find($id);
        if($services->is_active )
            $services->is_active=0;
        else 
            $services->is_active=1;
        if($services->save())
        return redirect()->back()->with([
            'success'   => CRUDMessages::MESSAGE_ACTIVE_SUCCESS,
        ]);
    }

    public function delete($id){
        $services=Services::find($id);
        if ($services->delete())
        return redirect()->back()->with([
            'success'   => CRUDMessages::MESSAGE_DELETE_SUCCESS,
        ]);
    }
}
