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
        return view('reports.edit',$data);
    }

    public function save(Request $request, $id){
        $report = ReportOverride::find($id);
        if(!$report){
            $report = new ReportOverride();
            $report->id = $id;
        }
        $report->households_with_children = $request->households_with_children;
        $report->average_household_income = $request->average_household_income;
        $report->median_age = $request->median_age;
        $report->save();
        return redirect(url('report/edit/'.$id));
    }
    public function json($id){
        $report = ReportOverride::findOrfail($id)->get();
        return response()->json($report[0]);
    }
}
