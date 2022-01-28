<?php

namespace App\Http\Controllers;

use App\BlogCategory;
use App\BlogPost;
use App\ImageUpload;
use App\BlogTag;
use Session;
use Auth;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{

    public function index()
    {
        $posts = BlogPost::orderBy('id', 'desc')->where('status', 'Active')->paginate(5);
        $categories = BlogCategory::where('status', 'Active')->get();
        $recentPosts = BlogPost::orderBy('created_at', 'desc')->where('status', 'Active')->take(3)->get();
        $tags = BlogTag::all();
	    return view('blog.index', [
            'posts' => $posts,
            'categories' =>$categories,
            'recentPosts' => $recentPosts,
            'tags' => $tags,
        ]);
    }

    public function show($id)
    {
        $post = BlogPost::find($id);
        $categories = BlogCategory::where('status', 'Active')->get();
        $recentPosts = BlogPost::orderBy('created_at', 'desc')->where('status', 'Active')->take(3)->get();
        $tags = BlogTag::all();
        return view('blog.show', compact('post', 'categories', 'recentPosts', 'tags'));
    }

    public function search(Request $request){

        $categories = BlogCategory::where('status', 'Active')->get();
        $recentPosts = BlogPost::orderBy('created_at', 'desc')->where('status', 'Active')->take(3)->get();
        $tags = BlogTag::all();
        $keyWord =  $request->input('search');
        $post = BlogPost::where('title', 'LIKE', "%{$keyWord}%")->first();

        return view('blog.search', compact('post', 'categories', 'recentPosts', 'tags'));

    }

    public function autocomplete(Request $request)
    {
        $term = $request->term;
        $items = BlogPost::select("title")->where("title","LIKE","%{$term}%")->get();
        foreach($items as $key =>$value) {
            $searchResults[] = $value['title'];
        }

        return $searchResults;
    }

    public function getTagPosts($id)
    {
        $posts = BlogPost::orderBy('id', 'desc')->where('id', $id)->get();
        $categories = BlogCategory::where('status', 'Active')->get();
        $recentPosts = BlogPost::orderBy('created_at', 'desc')->where('status', 'Active')->take(3)->get();
        $tags = BlogTag::all();
        $tag = BlogTag::find($id);
        return view('blog.tagPosts', compact('posts', 'categories', 'recentPosts', 'tag', 'tags'));
    }

    public function getCategoryPosts($id)
    {
        $posts = BlogPost::orderBy('id', 'desc')->where('category_id', $id)->get();
        $categories = BlogCategory::where('status', 'Active')->get();
        $recentPosts = BlogPost::orderBy('created_at', 'desc')->where('status', 'Active')->take(3)->get();
        $tags = BlogTag::all();
        return view('blog.categoryPosts', compact('posts', 'categories', 'recentPosts', 'tags'));
    }

    public function getBlogPosts()
    {

        $posts = BlogPost::orderBy('id', 'desc')->paginate(5); 

	    return view('blog.posts.index', [
            'posts' => $posts,
        ]);
    }

    public function createBlogPost()
    {
        $tags = BlogTag::all();
        $categories = BlogCategory::all();
        return view('blog.posts.create',compact('categories', 'tags'));
    }

    public function storePost(Request $request)
    {

        $userId = Auth::User()->userId;

        $this->validate($request, array(
            'title'         => 'required',
            'category_id'   => 'required',
            'image' => 'required',
            'description' => 'required',
        ));

        $post = new BlogPost;

        $post->title = $request->title;
        $post->status = $request->status;
        $post->category_id = $request->category_id;
        $post->description = $request->description;
        $post->userId = $userId;

        if($request->hasFile('image')){
            $post->image = ImageUpload::upload('/upload/blog',$request->file('image'));
        }

        $post->save();

        $post->tags()->sync($request->tags, false);

        Session::flash('success_msg', 'Post Created Successfully');
        return redirect(route('blog.posts'));    
    }

    public function editPost($id)
    {
        $post = BlogPost::find($id);
        $categories = BlogCategory::all();
        $tags = BlogTag::all();
        return view('blog.posts.edit',compact('categories','post','tags'));
    }

    public function updatePost(Request $request,$id)
    {
        $userId = Auth::User()->userId;

        $this->validate($request, array(
            'title'         => 'required',
            'category_id'   => 'required',
            'description' => 'required',
        ));

        $post = BlogPost::find($id);

        $post->title = $request->title;
        $post->status = $request->status;
        $post->category_id = $request->category_id;
        $post->description = $request->description;
        $post->userId = $userId;

        if($request->hasFile('image')){
            $post->image = ImageUpload::upload('/upload/blog',$request->file('image'));
        } else {
            unset($post->image);
        }

        $post->save();

        if (isset($request->tags)) {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->sync(array());
        }

        Session::flash('success_msg', 'Post Updated Successfully');
        return redirect(route('blog.posts'));

    }

    public function deletePost($id)
    {
        $post = BlogPost::find($id);
        $post->tags()->detach();
        $post->delete();

        Session::flash('success_msg', 'Post Deleted Successfully');
        return redirect(route('blog.posts'));
    }

    public function getBlogCategories()
    {
        $categories = BlogCategory::orderBy('id', 'desc')->paginate(10); 
	    return view('blog.categories.index', [
            'categories' => $categories,
        ]);
    }

    public function createBlogCategory()
    {
        return view('blog.categories.create');
    }

    public function storeCategory(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required',
        ));

        $category = new BlogCategory;

        $category->name = $request->name;
        $category->status = $request->status;
        $category->description = $request->description;

        $category->save();

        Session::flash('success_msg', 'Category Created Successfully');
        return redirect(route('blog.categories'));

    }

    public function editCategory($id)
    {
        $category = BlogCategory::find($id);;
        return view('blog.categories.edit',compact('category'));   
    }

    public function updateCategory(Request $request,$id)
    {
        $this->validate($request, array(
            'name' => 'required',
        ));

        $category = BlogCategory::find($id);

        $category->name = $request->name;
        $category->status = $request->status;
        $category->description = $request->description;

        $category->save();

        Session::flash('success_msg', 'Category Updated Successfully');
        return redirect(route('blog.categories'));       
    }

    public function deleteCategory($id)
    {
        $category = BlogCategory::find($id);
        $category->delete();

        Session::flash('success_msg', 'Category Deleted Successfully');
        return redirect(route('blog.categories'));
    }

}
