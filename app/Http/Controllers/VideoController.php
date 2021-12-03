<?php

namespace App\Http\Controllers;
use Yajra\Datatables\Datatables;
use App\Video;
use Validator;
use Session;

use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
    	$video = Video::latest()->get();

    	if ($request->ajax()) {
            return Datatables::of($video)

            		->addIndexColumn()

                    ->addColumn('action', function($video){
	                    $btn = '';
	                    $btn .= ' <a href="'. route('video.show',[$video->id]) .'" class="btn btn-info btn-sm btn-flat" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-eye"></i></a>';
	                    $btn .= ' <a href="'. route('video.edit',[$video->id]) .'" class="btn btn-primary btn-sm btn-flat" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>';
	                    $btn .= '<form action="'.route('video.delete',[$video->id]) .'" method="POST" style="display:contents">';
	                    $btn .= '<input type="hidden" name="_method" value="DELETE">';
	                    $btn .= csrf_field();
	                    $btn .= '<button class="btn btn-danger btn-sm remove-customer" type="submit"><span class="fa fa-remove"></span></button>';
	                    $btn .= '</form>';
	                    return $btn;
	                })

                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.video.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
    	return view('admin.video.create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {	
    	$input = $request->all();

    	$regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';

    	$validator = Validator::make($input, [
            'link' => 'required|regex:'.$regex,
        ]);

        if($validator->passes()){

            Video::create($input);

            Session::flash('success_msg', 'Video Store Successfuly');
            return redirect(route('video'));
        }

    	return redirect()->back()->withErrors($validator)->withInput(); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
    	$video = Video::where('id',$id)->first();
    	return view('admin.video.edit',compact('video'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request,$id)
    {	
    	$input = $request->all();

    	$regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';

    	$validator = Validator::make($input, [
            'link' => 'required|regex:'.$regex,
        ]);

        if($validator->passes()){

            $input = array_except($input,["_token","id"]);
            video::where("id",$request->id)->update($input);

            Session::flash('success_msg', 'Video Update Successfuly');
            return redirect(route('video'));
        }

    	return redirect()->back()->withErrors($validator)->withInput(); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
    	$video = Video::where('id',$id)->first();
    	return view('admin.video.show',compact('video'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function delete($id)
    {
    	Video::find($id)->delete();
        Session::flash('success_msg', 'Video Delete Successfuly');
        return redirect(route('video'));
    }
}
