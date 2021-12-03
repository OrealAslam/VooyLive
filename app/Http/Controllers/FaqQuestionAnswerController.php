<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FaqQuestionAnswer;
use App\FaqQuestionTitle;
use Yajra\Datatables\Datatables;
use Session;

class FaqQuestionAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $id =$request->titleId;
        $faqQuestionTitle = FaqQuestionTitle::find($id);

        if ($request->ajax()) {
            $faqQuestionAnswer = FaqQuestionAnswer::where('faq_question_title_id',$id)->latest()->get();
            return Datatables::of($faqQuestionAnswer)

                ->addIndexColumn()
                ->addColumn('description', function($row){
                    $description = $row->description;
                    return $description;
                })
                ->addColumn('action', function($row){
                   $btn = '<a href="'. route('faq-question-answer.show',[$row->id]) .'" class="btn btn-info btn-sm btn-flat" data-toggle="tooltip" data-placement="top" title="Show"><i class="fa fa-eye"></i></a>';
                   $btn = $btn.' <a href="'. route('faq-question-answer.edit',[$row->id]) .'" class="btn btn-primary btn-sm btn-flat" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>';
                   $btn = $btn.'<form action="'.route('faq-question-answer.destroy',$row->id).'" method="POST" style="display: inline-flex;">';
                   $btn = $btn. csrf_field();
                   $btn = $btn. method_field('delete');
                   $btn = $btn.' <button class="btn btn-danger btn-flat btn-sm remove-cr"  data-toggle="tooltip" data-placement="top" title="Delete"> <i class="fa fa-trash"></i></button>';
                   $btn = $btn.'</form>';

                    return $btn;
                })
                ->rawColumns(['action','description'])    

                ->make(true);
        }

        return view('admin.faqQuestionAnswer.index',compact('id','faqQuestionTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $id = $request->id;
        
        return view('admin.faqQuestionAnswer.create',compact('id'));
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

       FaqQuestionAnswer::create($input);

       Session::flash('success_msg', 'Faq Question Answer Create Successfuly');
       return redirect()->route('faq-question-answer.index',['titleId'=>$input['faq_question_title_id']]);  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(FaqQuestionAnswer $faqQuestionAnswer)
    {
        return view('admin.faqQuestionAnswer.show',compact('faqQuestionAnswer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FaqQuestionAnswer $faqQuestionAnswer)
    {
        return view('admin.faqQuestionAnswer.edit',compact('faqQuestionAnswer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FaqQuestionAnswer $faqQuestionAnswer)
    {
       $faqQuestionAnswer->update($request->all());

       Session::flash('success_msg', 'Faq Question Answer Update Successfuly');
       return redirect()->route('faq-question-answer.index',['titleId'=>$faqQuestionAnswer->faq_question_title_id]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FaqQuestionAnswer $faqQuestionAnswer)
    {
       $faqQuestionAnswer->delete();

       Session::flash('success_msg', 'Faq Question Answer Delete Successfuly');
       return redirect()->route('faq-question-answer.index',['titleId'=>$faqQuestionAnswer->faq_question_title_id]); 
    }
}
