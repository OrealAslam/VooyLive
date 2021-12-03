<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\ContactUs;
use Session;

class ContactUsController extends Controller
{
    public function index(Request $request)
    {
    	if ($request->ajax()) {

            $contactUs = ContactUs::latest()->get();

            return Datatables::of($contactUs)
                ->addIndexColumn()

                ->addColumn('created_at', function($contactUs){
                    return date('d-m-Y', strtotime($contactUs->created_at));
                })

                ->addColumn('action', function($contactUs){
                    $btn = '';
                    $btn .= '<form action="'.route('contactUs.delete',[$contactUs->id]) .'" method="POST" style="display:contents">';
                    $btn .= '<input type="hidden" name="_method" value="DELETE">';
                    $btn .= csrf_field();
                    $btn .= '<button class="btn btn-danger btn-sm remove-customer" type="submit"><span class="fa fa-remove"></span></button>';
                    $btn .= '</form>';
                    return $btn;
                })

                ->rawColumns(['action','created_at'])
                ->make(true);
        }

    	return view('admin.contactUs.index');
    }

    public function delete($id)
    {
        ContactUs::find($id)->delete();
        Session::flash('success_msg', 'ContactUs Delete Successfuly');
        return redirect(route('contactUs'));
    }
}
