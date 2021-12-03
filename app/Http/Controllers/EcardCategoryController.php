<?php

namespace App\Http\Controllers;
use App\EcardCategory;
use Validator;
use Session;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class EcardCategoryController extends Controller
{	
	/**
     * Ecard Category List.
     *
     * @param  string  $key
     * @return void
     */
    public function ecardCategorysList(Request $request)
    {
    	if ($request->ajax()) {
            
            $category = EcardCategory::latest()->get();
            
            return Datatables::of($category)

                ->addIndexColumn()
                
                ->addColumn('action', function($category){
                    $str = '';
                    $str .= ' <a href="'. route('ecard.category.edit',[$category->id]) .'" class="btn btn-primary btn-sm btn-flat" data-toggle="tooltip" data-placement="top" title="Edit" style=""><i class="fa fa-pencil"></i></a>';
                    $str .= '<form action="'.url('admin/ecard/categories/delete/'.$category->id).'" method="POST" style="display:contents">';
                    $str .= '<input type="hidden" name="_method" value="DELETE">';
                    $str .= csrf_field();
                    $str .= '<button class="btn btn-danger btn-sm remove-customer" type="submit"><span class="fa fa-remove"></span></button>';
                    $str .= '</form>';
                    return $str;
                })
                
                ->rawColumns(['action'])    

                ->make(true);
        }
    	return view('admin.ecards.category.index');
    }

    /**
     * Ecard Category Create.
     *
     * @param  string  $key
     * @return void
     */
    public function ecardCategoryCreate()
    {
    	return view('admin.ecards.category.create');
    }

    /**
     * Ecard Category Store.
     *
     * @param  string  $key
     * @return void
     */
    public function ecardCategoryStore(Request $request)
    {
    	$input = $request->all();

        $validator = Validator::make($input,[
            'name' => 'required',
        ], 
        [
            'name.required' => 'The Ecards Category Name field is required',
        ]);

        if ($validator->passes()){

            EcardCategory::create($input);

            Session::flash('success_msg', 'Ecards Category Create Successfuly');
            return redirect(route('ecard.categorys'));    
        }

        return redirect()->back()->withErrors($validator)->withInput();
    }

    /**
     * Ecard Category Edit.
     *
     * @param  string  $key
     * @return void
     */
    public function ecardCategoryEdit(Request $request,$id)
    {	
    	$ecardCategory =  EcardCategory::where('id',$id)->first();
    	return view('admin.ecards.category.edit',compact('ecardCategory'));
    }

    /**
     * Ecard Category Update.
     *
     * @param  string  $key
     * @return void
     */
    public function ecardCategoryUpdate(Request $request,$id)
    {
    	$input = $request->all();

        $validator = Validator::make($input,[
            'name' => 'required',
        ], 
        [
            'name.required' => 'The Ecards Category Name field is required',
        ]);

        if ($validator->passes()){

        	$input = array_except($input,["_token","id"]);
        	EcardCategory::where("id",$request->id)->update($input);

            Session::flash('success_msg', 'Ecards Category Update Successfuly');
            return redirect(route('ecard.categorys'));    
        }

        return redirect()->back()->withErrors($validator)->withInput();
    }

    public function ecardCategoryDelete($id)
    {
    	EcardCategory::where('id',$id)->delete();
    	Session::flash('success_msg', 'Ecards Category Delete Successfuly');
    	return redirect(route('ecard.categorys'));    
    }
}
