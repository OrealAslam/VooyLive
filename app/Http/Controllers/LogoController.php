<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logo;
use Yajra\Datatables\Datatables;
use Session;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        return view('admin.logo.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name = time().$image->getClientOriginalName();
            $destinationPath = 'upload/logo/';
            $image->storeAs($destinationPath, $name);
            $input['file'] = $name;
        }

        Logo::create(['name' => $name]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $logos = Logo::latest()->get();
        
        foreach ($logos as $key => $value) {
            $data[$key]['name'] = $value;
            $data[$key]['path'] = env('AWS_URL').'upload/logo/'.$value->name);
        }

        return response()->json(['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $logo  = Logo::where('name',$request->name)->first();
        $logo->delete();
    }
}
