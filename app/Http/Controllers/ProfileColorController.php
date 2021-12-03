<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProfileColor;
use Validator;
use Session;
use Yajra\Datatables\Datatables;

class ProfileColorController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profileColorList(Request $request)
    {
    	$data = ProfileColor::latest()->get();

    	if ($request->ajax()) {
            return Datatables::of($data)

            	->addIndexColumn()

                ->addColumn('action', function($data){
                    $btn = '';
                    $btn .= ' <a href="'. route('profile.colour.edit',[$data->id]) .'" class="btn btn-primary btn-sm btn-flat" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>';
                    $btn .= '<form action="'.route('profile.colour.delete',[$data->id]) .'" method="POST" style="display:contents">';
                    $btn .= '<input type="hidden" name="_method" value="DELETE">';
                    $btn .= csrf_field();
                    $btn .= '<button class="btn btn-danger btn-sm remove-customer" type="submit"><span class="fa fa-remove"></span></button>';
                    $btn .= '</form>';
                    return $btn;
                })

                ->rawColumns(['action'])
                ->make(true);
        }
    	return view('admin.profileColor.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profileColorCreate()
    {
    	return view('admin.profileColor.create');	
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profileColorStore(Request $request)
    {
    	$input = $request->all();

    	$validator = Validator::make($input,[
            'name' => 'required',
        ]);

        if($validator->passes()){
        	ProfileColor::create($input);
        	Session::flash('success_msg', 'Profile Color Store Successfuly');
        	return redirect()->route('profileColours');
        }

        return redirect()->back()->withErrors($validator)->withInput(); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profileColorEdit($id)
    {
    	$data = ProfileColor::where('id',$id)->first();
    	return view('admin.profileColor.edit',compact('data'));	
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profileColorUpdate(Request $request,$id)
    {
    	$input = $request->all();

    	$validator = Validator::make($input,[
            'name' => 'required',
        ]);

        if($validator->passes()){

        	$input = array_except($input,["_token","id"]);
            ProfileColor::where("id",$request->id)->update($input);

        	Session::flash('success_msg', 'Profile Color Update Successfuly');
        	return redirect()->route('profileColours');
        }

        return redirect()->back()->withErrors($validator)->withInput(); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profileColorDelete($id)
    {
    	ProfileColor::find($id)->delete();
        Session::flash('success_msg', 'ProfileColor Delete Successfuly');
        return redirect(route('profileColours'));
    }
}
