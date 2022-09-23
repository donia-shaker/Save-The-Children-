<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Enum\CRUDMessages;
use App\Http\Requests\ReportsRequest;
use App\Models\Reports;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function show()
    {
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $report = isset($_GET['Id']) ? $report = Reports::where('id', $_GET['Id'])->first() : 'all';
        $reports = Reports::orderBy('id', 'DESC')->get();
        return view('admin.reports', [
            'reports' => $reports,
            'do'        => $do,
            'report'   => $report
        ]);
    }

    public function add(ReportsRequest $request)
    {
        // return $request;
        $request->validated();

        if ($request->hasFile('file'))
            $file = $this->uploadFile($request->file('file'));

        Reports::create([
            'title' => [
                'en'        =>      $request->titleEn,
                'ar'        =>      $request->titleAr
            ],
            'description' => [
                'en'        =>      $request->descriptionEn,
                'ar'        =>      $request->descriptionAr
            ],
            'pdf' =>$file,
            'is_active' =>  $request->is_active
        ]);

        return redirect()->route('reports')->with([
            'success'   => CRUDMessages::MESSAGE_ADD_SUCCESS,
        ]);
    }

    public function update(ReportsRequest $request, $id)
    {
        // return $request;
        $request->validated();

        if ($request->hasFile('file'))
            $file = $this->uploadFile($request->file('file'));

        Reports::find($id)->update([
            'title' => [
                'en'        =>      $request->titleEn,
                'ar'        =>      $request->titleAr
            ],
            'description' => [
                'en'        =>      $request->descriptionEn,
                'ar'        =>      $request->descriptionAr
            ],
            'pdf' =>$file,
            'is_active' =>  $request->is_active
        ]);

        return redirect()->route('reports')->with([
            'success'   => CRUDMessages::MESSAGE_UPDATE_SUCCESS,
        ]);
    }

    public function active($id)
    {
        $report = Reports::find($id);
        if ($report->is_active)
            $report->is_active = 0;
        else
            $report->is_active = 1;
        if ($report->save())
            return redirect()->back()->with([
                'success'   => CRUDMessages::MESSAGE_ACTIVE_SUCCESS,
            ]);
    }

    public function delete($id)
    {
        $report = Reports::find($id);
        if ($report->delete())
            return redirect()->back()->with([
                'success'   => CRUDMessages::MESSAGE_DELETE_SUCCESS,
            ]);
    }
}
