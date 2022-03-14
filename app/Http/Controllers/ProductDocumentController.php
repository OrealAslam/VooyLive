<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductDocument;
use App\ImageUpload;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;
use Validator;
use Storage;

class ProductDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productdocument = ProductDocument::latest()->get();
        if ($request->ajax()) {
            return Datatables::of($productdocument)
                    ->addColumn('link', function($row){
                        return '<a href="'.route('doc.download',['file'=>$row->document]).'">'.route('doc.download',['file'=>$row->document]).'</a>';
                    })
                    ->addIndexColumn()
                    ->addColumn('action', function($productdocument){
                        $btn = '';
                        $btn = ' <a href="'. route('doc.download',['file'=>$productdocument->document]) .'" class="btn btn-info btn-sm btn-flat" data-toggle="tooltip" data-placement="top" data-original-title="Download"><i class="fa fa-download"></i></a>';
                        $btn .= '<form action="'.route('product.document.destory',[$productdocument->id]) .'" method="POST" style="display:contents">';
                        $btn .= '<input type="hidden" name="_method" value="DELETE">';
                        $btn .= csrf_field();
                        $btn .= '<button class="btn btn-danger btn-sm remove-customer" type="submit"><span class="fa fa-remove"></span></button>';
                        $btn .= '</form>';
                        return $btn;
                    })

                    ->rawColumns(['action','link'])
                    ->make(true);
        }
        return view('admin.productDocument.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.productDocument.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input,[
            'title' => 'required',
            'document' => 'required',
        ]);

        if ($validator->passes()){

            if($request->hasFile('document')){
                $input['document'] = ImageUpload::uploadProductDoc('documents',$request->file('document'));
            }
                ProductDocument::create($input);
                Session::flash('success_msg', 'Product Document Create Successfuly');
                return redirect(route('product.document.index'));

        }
                return redirect()->back()->withErrors($validator)->withInput();
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        ProductDocument::find($request->id)->delete();
        return redirect()->back();
    }

    /**
     * Write Your Code..
     *
     * @return string
    */
    public function downloadFile(Request $request)
    {
        $path = 'userProductDetail/'.$request->file;
        if (Storage::disk('s3')->has($path)) {
            return response()->download(env('AWS_URL').$path);
        }
        return redirect()->route('home');
    }
}
