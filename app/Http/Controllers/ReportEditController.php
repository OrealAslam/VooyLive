<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReportOverride;

class ReportEditController extends Controller
{
    public function show($id){
        $data = [];
        $data['id'] = $id;
        $data['report'] = ReportOverride::find($id);
        if(!$data['report'])
        $data['report'] = new ReportOverride();
        return view('reports.edit',$data);
    }

    public function save(Request $request, $id)
    {
        $request = array_except($request->all(), ['_token']);
        $report = ReportOverride::find($id);
        if(!$report){
            $report = new ReportOverride();
            $report->id=$id;
        }
        $report->fill($request);
        $report->save();
        return redirect(url('report/edit/'.$id));
    }
    public function json($id){
        $report = ReportOverride::findOrfail($id)->get();
        return response()->json($report[0]);
    }
}
