<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUsRequest;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    function show()
    {
        $contactUs = ContactUs::select()->get();
        return response()->json([
            'contactUs' => $contactUs,
        ]);
    }

    function store(ContactUsRequest $request)
    {
        // return $request;
        $request->validated();

        if (!$request->validated()) {
            return response()->json([
                'status' => 400,
                'errors' => $request->validated()->getMessageBag(),
            ]);
        } else {
            $contactUs = new ContactUs();
            $data =  ['en' => $request->input('nameEn'), 'ar' => $request->input('nameAr')];
            $contactUs->name = json_encode($data);
            $contactUs->link = $request->input('link');
            $contactUs->icon = $request->input('icon');
            $contactUs->is_active = $request->input('isActive');

            if ($contactUs->save())
                return response()->json(
                    [
                        'status' => 200,
                        'message' => 'تم اضافة البيانات بنجاح',
                    ]
                );
        }
    }

    public function edit($id)
    {
        $contactUs = ContactUs::find($id);
        if ($contactUs) {
            return response()->json([
                'status' => 200,
                'contactUs' => $contactUs,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'لا يوجد اي بيانات',
            ]);
        }
    }

    public function update(ContactUsRequest $request, $id)
    {
        //  return $request;
        $request->validated();

        if (!$request->validated()) {
            return response()->json([
                'status' => 400,
                'errors' => $request->validated()->getMessageBag(),
            ]);
        } else {
            $contactUs = ContactUs::find($id);

            if ($contactUs) {
                $data =  ['en' => $request->input('nameEn'), 'ar' => $request->input('nameAr')];
                $contactUs->name = json_encode($data);
                $contactUs->link = $request->input('link');
                $contactUs->icon = $request->input('icon');
                if ($request->input('iaActive') != null) {
                    $contactUs->is_active = 1;
                }
                if ($contactUs->update()) {
                    return response()->json([
                        'status' => 200,
                        'message' => 'تم تعديل البيانات بنجاح',
                    ]);
                }
            }
        }
    }

    public function status($id)
    {
        $contactUs = ContactUs::find($id);

        if ($contactUs->is_active)
            $contactUs->is_active = 0;
        else
            $contactUs->is_active = 1;
        if ($contactUs->save()) {
            return response()->json([
                    'status' => 200,
                    'message' => 'تم تغيير حالة القسم بنجاح',
            ]);
        } else {
            return response()->json([
                    'status' => 404,
                    'message' => 'لا يوجد اي بيانات',
            ]);
        }
    }
    
    public function delete($id)
    {
        $contactUs = ContactUs::find($id);
        if ($contactUs->delete()) {
            return response()->json([
                    'status' => 200,
                    'message' => 'تم حذف البيانات بنجاح',
            ]);
        } else {
            return response()->json([
                    'status' => 404,
                    'message' => 'لا يوجد اي بيانات',
            ]);
        }
    }
}
