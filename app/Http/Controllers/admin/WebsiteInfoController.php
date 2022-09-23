<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\website_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WebsiteInfoController extends Controller
{
    public function website($id){
        $webSiteInfo = website_info::where('id',$id)->get();
        return view('admin.website',[ 
            'webSiteInfo'  => $webSiteInfo]);
    }

    public function editwebsite(Request $request, $id){
        // return $request;
        Validator::validate($request->all(),[
            'table_key_ar'=>['required','string'],
            'table_key_en'=>['required','string'],
            'table_valueAr'=>['required','string'],
            'table_valueEn'=>['required','string'],]);

        $webSiteInfo =  website_info::find($id)->update([

            'table_key' => [
                'en'        =>      $request->table_key_en,
                'ar'        =>      $request->table_key_ar
            ],
            'table_value' => [
                'en'        =>      $request->table_valueEn,
                'ar'        =>      $request->table_valueAr
            ]
         ]);
        return redirect()->back()->with(['success' => 'تم تعديل البيانات بنجاح']);
        

    }
}
