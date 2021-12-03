<?php

namespace App\Http\Controllers;
use App\EcardPhoto;
use App\EcardCategory;
use Validator;
use Session;
use App\ImageUpload;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class EcardPhotoController extends Controller
{
    /**
     * Ecard Photo List.
     *
     * @param  string  $key
     * @return void
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            
            $ecardPhoto = EcardPhoto::latest()->get();
            
            return Datatables::of($ecardPhoto)

            ->addIndexColumn()

            ->addColumn('ecard_catgory_name', function($ecardPhoto){
                if(!empty($ecardPhoto->EcardCategoryName->name)){
                    return $ecardPhoto->EcardCategoryName->name;
                }else{
                    return '-';
                }
            })

            ->addColumn('action', function($ecardPhoto){
                $str = '';
                $str .= ' <a class="btn btn-flat btn-sm btn-info" href="'. route('ecard.photo.show',$ecardPhoto->id) .'" data-toggle="tooltip" data-placement="top" title="Show" style=""> <i class="fa fa-eye"></i></a>';
                $str .= ' <a href="'. route('ecard.photo.edit',[$ecardPhoto->id]) .'" class="btn btn-primary btn-sm btn-flat" data-toggle="tooltip" data-placement="top" title="Edit" style=""><i class="fa fa-pencil"></i></a>';
                $str .= '<form action="'.url('admin/ecard/photo/delete/'.$ecardPhoto->id).'" method="POST" style="display:contents">';
                $str .= '<input type="hidden" name="_method" value="DELETE">';
                $str .= csrf_field();
                $str .= '<button class="btn btn-danger btn-sm remove-customer" type="submit"><span class="fa fa-remove"></span></button>';
                $str .= '</form>';
                return $str;
            })
            
            ->rawColumns(['action','ecard_catgory_name'])    

            ->make(true);
        }

    	return view('admin.ecards.photos.index');
    }

    /**
     * Ecard Photo Create.
     *
     * @param  string  $key
     * @return void
     */
    public function create()
    {
        $ecardCategory = EcardCategory::get();
    	return view('admin.ecards.photos.create',compact('ecardCategory'));
    }

    /**
     * Ecard Photo Store.
     *
     * @param  string  $key
     * @return void
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input,[
            'ecards_categories_id' => 'required',
            'title' => 'required',
            'x_greeting_coordinate' => 'required',
            'y_greeting_coordinate' => 'required',
            'x_solution_coordinate' => 'required',
            'y_solution_coordinate' => 'required',
            'x_message_coordinate' => 'required',
            'y_message_coordinate' => 'required',
            'x_signature_coordinate' => 'required',
            'y_signature_coordinate' => 'required',
            'sample_image' => 'required',
            'blank_image' => 'required',
        ]);

        if ($validator->passes()){

            if($request->hasFile('sample_image')){
                $input['sample_image'] = ImageUpload::upload('/upload/ecard/sample',$request->file('sample_image'));
            }

            if($request->hasFile('blank_image')){
                $input['blank_image'] = ImageUpload::upload('/upload/ecard/blank',$request->file('blank_image'));
            }

            EcardPhoto::create($input);

            Session::flash('success_msg', 'Ecard Photo Create Successfuly');
            return redirect(route('ecard.photo'));    
        }

        return redirect()->back()->withErrors($validator)->withInput();
    }

    /**
     * Ecard Photo Edit.
     *
     * @param  string  $key
     * @return void
     */
    public function edit($id)
    {   
        $ecardCategory = EcardCategory::get();
        $ecardPhoto = EcardPhoto::where('id',$id)->first();
    	return view('admin.ecards.photos.edit',compact('ecardCategory','ecardPhoto'));
    }

    /**
     * Ecard Photo Update.
     *
     * @param  string  $key
     * @return void
     */
    public function update(Request $request,$id)
    {
    	$input = $request->all();

        $validator = Validator::make($input,[
            'ecards_categories_id' => 'required',
            'title' => 'required',
            'x_greeting_coordinate' => 'required',
            'y_greeting_coordinate' => 'required',
            'x_solution_coordinate' => 'required',
            'y_solution_coordinate' => 'required',
            'x_message_coordinate' => 'required',
            'y_message_coordinate' => 'required',
            'x_signature_coordinate' => 'required',
            'y_signature_coordinate' => 'required',
        ]);

        if ($validator->passes()){

            if($request->hasFile('sample_image')){
                $input['sample_image'] = ImageUpload::upload('/upload/ecard/sample',$request->file('sample_image'));
            }

            if($request->hasFile('blank_image')){
                $input['blank_image'] = ImageUpload::upload('/upload/ecard/blank',$request->file('blank_image'));
            }

            $input = array_except($input,["_token","id","coordinate"]);
            EcardPhoto::where("id",$request->id)->update($input);

            Session::flash('success_msg', 'Ecard Photo Update Successfuly');
            return redirect(route('ecard.photo'));    
        }

        return redirect()->back()->withErrors($validator)->withInput();
    }

    /**
     * Ecard Photo Show.
     *
     * @param  string  $key
     * @return void
     */
    public function show($id)
    {
        $ecardPhoto = EcardPhoto::where('id',$id)->first();
        return view('admin.ecards.photos.show',compact('ecardPhoto'));
    }

    /**
     * Ecard Photo Delete.
     *
     * @param  string  $key
     * @return void
     */
    public function delete($id)
    {
    	EcardPhoto::where('id',$id)->delete();
        Session::flash('success_msg', 'Ecards Photo Delete Successfuly');
        return redirect(route('ecard.photo'));    
    }
}
