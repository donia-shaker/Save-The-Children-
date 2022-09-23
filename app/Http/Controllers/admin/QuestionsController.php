<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Enum\CRUDMessages;
use App\Http\Requests\QuestionsRequest;
use App\Models\Questions;
use App\Models\Services;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function show()
    {
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $question = isset($_GET['Id']) ? $question = Questions::where('id',$_GET['Id'])->first():'all';
        $questions = Questions::with('service')->orderBy('id', 'DESC')->get();
        $services = Services::get();
        return view('admin.questions', [
            'questions' => $questions,
            'do'        => $do,
            'question'   => $question,
            'services'   => $services,
        ]);
    }

    public function add(QuestionsRequest $request)
    {
        $request->validated();

            Questions::create([
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

        return redirect()->route('questions')->with([
            'success'   => CRUDMessages::MESSAGE_ADD_SUCCESS,
        ]);
    }

    public function update(QuestionsRequest $request, $id){
        // return $request;
        $request->validated();

            Questions::find($id)->update([
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

        return redirect()->route('questions')->with([
            'success'   => CRUDMessages::MESSAGE_UPDATE_SUCCESS,
        ]);
    }

    public function active($id){
        $questions=Questions::find($id);
        if($questions->is_active )
            $questions->is_active=0;
        else 
            $questions->is_active=1;
        if($questions->save())
        return redirect()->back()->with([
            'success'   => CRUDMessages::MESSAGE_ACTIVE_SUCCESS,
        ]);
    }

    public function delete($id){
        $questions=Questions::find($id);
        if ($questions->delete())
        return redirect()->back()->with([
            'success'   => CRUDMessages::MESSAGE_DELETE_SUCCESS,
        ]);
    }
}
