<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubscribeUs;
use Yajra\Datatables\Datatables;
use Validator;

class SubscribeUsController extends Controller
{   
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function subscribeUs(Request $request)
    {
    	$input = $request->all();

        $validator = Validator::make($input, [
            'email' => 'required',
        ]);

        if ($validator->passes()){
    		SubscribeUs::create($request->all());
    		return response()->json(['success'=>'done']);
        }

    	return response()->json(['error'=>'done']);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function subscribeUsList(Request $request)
    {
        if ($request->ajax()) {
            $subscribeUs = SubscribeUs::latest()->get();

            return Datatables::of($subscribeUs)
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.subscribeUs.index');
    }
}
