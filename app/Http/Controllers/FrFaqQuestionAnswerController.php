<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FrFaqQuestionAnswer;
use App\FrFaqQuestionTitle;
use Yajra\Datatables\Datatables;
use Session;

class FrFaqQuestionAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $id =$request->titleId;
        $frFaqQuestionTitle = FrFaqQuestionTitle::find($id);

        if ($request->ajax()) {
            $frFaqQuestionAnswer = FrFaqQuestionAnswer::where('fr_faq_question_title_id',$id)->latest()->get();
            return Datatables::of($frFaqQuestionAnswer)

                ->addIndexColumn()
                ->addColumn('description', function($row){
                    $description = $row->description;
                    return $description;
                })
                ->addColumn('action', function($row){
                   $btn = '<a href="'. route('fr-faq-question-answer.show',[$row->id]) .'" class="btn btn-info btn-sm btn-flat" data-toggle="tooltip" data-placement="top" title="Show"><i class="fa fa-eye"></i></a>';
                   $btn = $btn.' <a href="'. route('fr-faq-question-answer.edit',[$row->id]) .'" class="btn btn-primary btn-sm btn-flat" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>';
                   $btn = $btn.'<form action="'.route('fr-faq-question-answer.destroy',$row->id).'" method="POST" style="display: inline-flex;">';
                   $btn = $btn. csrf_field();
                   $btn = $btn. method_field('delete');
                   $btn = $btn.' <button class="btn btn-danger btn-flat btn-sm remove-cr"  data-toggle="tooltip" data-placement="top" title="Delete"> <i class="fa fa-trash"></i></button>';
                   $btn = $btn.'</form>';

                    return $btn;
                })
                ->rawColumns(['action','description'])    

                ->make(true);
        }

        return view('admin.frFaqQuestionAnswer.index',compact('id','frFaqQuestionTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $id = $request->id;
        
        return view('admin.frFaqQuestionAnswer.create',compact('id'));
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

       FrFaqQuestionAnswer::create($input);

       Session::flash('success_msg', 'Fr Faq Question Answer Create Successfuly');
       return redirect()->route('fr-faq-question-answer.index',['titleId'=>$input['fr_faq_question_title_id']]);  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(FrFaqQuestionAnswer $frFaqQuestionAnswer)
    {
        return view('admin.frFaqQuestionAnswer.show',compact('frFaqQuestionAnswer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FrFaqQuestionAnswer $frFaqQuestionAnswer)
    {
        return view('admin.frFaqQuestionAnswer.edit',compact('frFaqQuestionAnswer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FrFaqQuestionAnswer $frFaqQuestionAnswer)
    {
       $frFaqQuestionAnswer->update($request->all());

       Session::flash('success_msg', 'Fr Faq Question Answer Update Successfuly');
       return redirect()->route('fr-faq-question-answer.index',['titleId'=>$frFaqQuestionAnswer->fr_faq_question_title_id]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrFaqQuestionAnswer $frFaqQuestionAnswer)
    {
       $frFaqQuestionAnswer->delete();

       Session::flash('success_msg', 'Fr Faq Question Answer Delete Successfuly');
       return redirect()->route('fr-faq-question-answer.index',['titleId'=>$frFaqQuestionAnswer->fr_faq_question_title_id]); 
    }
}
