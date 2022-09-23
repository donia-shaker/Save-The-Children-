<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Enum\CRUDMessages;
use App\Http\Requests\ProjectsRequest;
use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function show()
    {
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $project = isset($_GET['Id']) ? $project = Projects::where('id',$_GET['Id'])->first():'all';
        $projects = Projects::orderBy('id', 'DESC')->get();
        return view('admin.projects', [
            'projects' => $projects,
            'do'        => $do,
            'project'   => $project
        ]);
    }

    public function add(ProjectsRequest $request)
    {
        $request->validated();

        if($request->hasFile('image'))
            $image=$this->uploadFile($request->file('image'));

            Projects::create([
            'name'      => [
                'ar'    => $request->nameAr,
                'en'    => $request->nameEn
            ],
            'image'     =>  $image,
            'description'      => [
                'ar'    => $request->descriptionAr,
                'en'    => $request->descriptionEn
            ],
            'page_content'     =>  [
                'ar'    => $request->page_contentAr,
                'en'    => $request->page_contentEn
            ],
            'is_active' =>  $request->is_active
            ]);

        return redirect()->route('projects')->with([
            'success'   => CRUDMessages::MESSAGE_ADD_SUCCESS,
        ]);
    }

    public function update(ProjectsRequest $request, $id){
        // return $request;
        $request->validated();

        if($request->hasFile('image'))
            $image=$this->uploadFile($request->file('image'));

            Projects::find($id)->update([
                'name'      => [
                    'ar'    => $request->nameAr,
                    'en'    => $request->nameEn
                ],
                'image'     =>  $image,
                'description'      => [
                    'ar'    => $request->descriptionAr,
                    'en'    => $request->descriptionEn
                ],
                'page_content'     =>  [
                    'ar'    => $request->page_contentAr,
                    'en'    => $request->page_contentEn
                ],
                'is_active' =>  $request->is_active
            ]);

        return redirect()->route('projects')->with([
            'success'   => CRUDMessages::MESSAGE_UPDATE_SUCCESS,
        ]);
    }

    public function active($id){
        $projects=Projects::find($id);
        if($projects->is_active )
            $projects->is_active=0;
        else 
            $projects->is_active=1;
        if($projects->save())
        return redirect()->back()->with([
            'success'   => CRUDMessages::MESSAGE_ACTIVE_SUCCESS,
        ]);
    }

    public function delete($id){
        $projects=Projects::find($id);
        if ($projects->delete())
        return redirect()->back()->with([
            'success'   => CRUDMessages::MESSAGE_DELETE_SUCCESS,
        ]);
    }
}
