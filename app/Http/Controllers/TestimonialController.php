<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;
use Validator;
use Yajra\Datatables\Datatables;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function testimonialList(Request $request)
    {
        $testimonial = Testimonial::latest()->get();

        if ($request->ajax()) {
            return Datatables::of($testimonial)

                ->addIndexColumn()

                ->addColumn('action', function ($testimonial) {
                    $btn = '';
                    $btn .= ' <a href="' . route('testimonial.edit', [$testimonial->id]) . '" class="btn btn-primary btn-sm btn-flat" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>';
                    $btn .= '<form action="' . route('testimonial.delete', [$testimonial->id]) . '" method="POST" style="display:contents">';
                    $btn .= '<input type="hidden" name="_method" value="DELETE">';
                    $btn .= csrf_field();
                    $btn .= '<button class="btn btn-danger btn-sm remove-customer" type="submit"><span class="fa fa-remove"></span></button>';
                    $btn .= '</form>';
                    return $btn;
                })

                ->addColumn('image', function ($product) {
                    $bucket_path = env('AWS_URL');
                    return $image = '<img src="' . $bucket_path . 'upload/testimonial/' . $product->image . '' . '" style="max-width:100px;max-height:100px">';
                })

                ->rawColumns(['action', 'image'])
                ->make(true);
        }

        return view('admin.testimonial.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required',
            'name' => 'required',
            'designation' => 'required',
            'description' => 'required',
            'image' => 'required|file|mimes:jpg,jpeg,png',
        ]);

        if ($validator->passes()) {

            if ($request->hasFile('image')) {
                $input['image'] = Storage::put('upload/testimonial', $request->file('image'));
                $input['image'] = str_replace('upload/testimonial/', '', $input['image']);
            }

            Testimonial::create($input);

            Session::flash('success_msg', 'Testimonial Store Successfuly');
            return redirect(route('testimonial'));
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
        $testimonial = Testimonial::where('id', $id)->first();
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required',
            'name' => 'required',
            'designation' => 'required',
            'description' => 'required',
        ]);

        if ($validator->passes()) {

            if ($request->hasFile('image')) {
                $input['image'] = Storage::put('upload/testimonial', $request->file('image'));
                $input['image'] = str_replace('upload/testimonial/', '', $input['image']);
            }

            $input = array_except($input, ["_token", "id"]);
            Testimonial::where("id", $request->id)->update($input);

            Session::flash('success_msg', 'Testimonial Edit Successfuly');
            return redirect(route('testimonial'));
        }

        return redirect()->back()->withErrors($validator)->withInput();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show()
    {
        return view('admin.testimonial.show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function delete($id)
    {
        Testimonial::find($id)->delete();
        Session::flash('success_msg', 'Testimonial Delete Successfuly');
        return redirect(route('testimonial'));
    }
}