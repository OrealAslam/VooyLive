<?php

namespace App\Http\Controllers;

use App\BlogTag;
use Session;
use Illuminate\Http\Request;

class BlogTagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = BlogTag::all();
        return view('blog.tags.index')->withTags($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array('name' => 'required|max:255'));
        $tag = new BlogTag;
        $tag->name = $request->name;
        $tag->save();

        Session::flash('success_msg', 'Tag Created Successfully');

        return redirect()->route('blog.tags');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlogTag  $blogTag
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $tag = BlogTag::find($id);
    //     return view('tags.show')->withTag($tag);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogTag  $blogTag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = BlogTag::find($id);
        return view('blog.tags.edit')->withTag($tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogTag  $blogTag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tag = BlogTag::find($id);
        $this->validate($request, ['name' => 'required|max:255']);
        $tag->name = $request->name;
        $tag->save();

        Session::flash('success_msg', 'Tag Updated Successfully!');
        return redirect()->route('blog.tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogTag  $blogTag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = BlogTag::find($id);
        $tag->posts()->detach();
        $tag->delete();

        Session::flash('success_msg', 'Tag deleted successfully!');
        return redirect()->route('blog.tags');
    }
}
