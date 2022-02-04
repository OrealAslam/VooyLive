<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FrFaqQuestionTitle;
use App\FrFaqQuestionAnswer;
use Yajra\Datatables\Datatables;
use Session;

class FrFaqQuestionTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {         
         if ($request->ajax()) {
            $frFaqQustionTitle = FrFaqQuestionTitle::latest()->get();

            return Datatables::of($frFaqQustionTitle)

                ->addIndexColumn()
                ->addColumn('action', function($row){
                   $btn = '<a href="'. route('fr-faq-question-answer.index',['titleId'=>$row->id]) .'" class="btn btn-info btn-sm btn-flat" data-toggle="tooltip" data-placement="top" title="Show">Manage Questions</a>';
                   $btn = $btn.' <a href="'. route('fr-faq-question-title.edit',[$row->id]) .'" class="btn btn-primary btn-sm btn-flat" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>';
                   $btn = $btn.'<form action="'.route('fr-faq-question-title.destroy',$row->id).'" method="POST" style="display: inline-flex;">';
                   $btn = $btn. csrf_field();
                   $btn = $btn. method_field('delete');
                   $btn = $btn.' <button class="btn btn-danger btn-flat btn-sm remove-cr"  data-toggle="tooltip" data-placement="top" title="Delete"> <i class="fa fa-trash"></i></button>';
                   $btn = $btn.'</form>';

                    return $btn;
                })
                ->rawColumns(['action'])    

                ->make(true);
        }
        return view('admin.frFaqQuestionTitles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.frFaqQuestionTitles.create');    
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

       FrFaqQuestionTitle::create($input);

       Session::flash('success_msg', 'Fr Faq Question Title Create Successfuly');
       return redirect()->route('fr-faq-question-title.index',['titleId'=>$request->fr_faq_question_title_id]);  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FrFaqQuestionTitle $frFaqQuestionTitle)
    {
        return view('admin.frFaqQuestionTitles.edit',compact('frFaqQuestionTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FrFaqQuestionTitle $frFaqQuestionTitle)
    {
       $frFaqQuestionTitle->update($request->all()) ;
       
       Session::flash('success_msg', 'Fr Faq Question Title Update Successfuly');
       return redirect()->route('fr-faq-question-title.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrFaqQuestionTitle $frFaqQuestionTitle)
    {
       $frFaqQuestionAnswers = FrFaqQuestionAnswer::where('fr_faq_question_title_id',$frFaqQuestionTitle->id);

       foreach ($frFaqQuestionAnswers as $key => $frFaqQuestionAnswer) {
           $frFaqQuestionAnswer->delete();
       }

       $frFaqQuestionTitle->delete();


       Session::flash('success_msg', 'Fr Faq Question Title Delete Successfuly');
       return redirect()->route('fr-faq-question-title.index'); 
    }
}
