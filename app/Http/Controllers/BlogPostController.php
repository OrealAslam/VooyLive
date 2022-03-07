<?php

namespace App\Http\Controllers;

use App\BlogCategory;
use App\BlogPost;
use App\ImageUpload;
use App\BlogTag;
use Session;
use Auth;
use Illuminate\Http\Request;
use App;

class BlogPostController extends Controller
{
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
        $post = new BlogPost();

        return view('blog.posts.edit', compact('categories', 'tags', 'post'));
    }

    public function storePost(Request $request)
    {

        $userId = Auth::User()->userId;

        $this->validate($request, array(
            'title'         => 'required',
            'category_id'   => 'required',
            'image' => 'required',
            'description' => 'required',
            'title_fr' => 'required',
            'description_fr' => 'required',
        ));

        $post = new BlogPost;
        $post->fill($request->all());
        $post->slug = str_slug($request->title);
        $post->userId = $userId;

        if ($request->hasFile('image')) {
            $post->image = ImageUpload::upload('/upload/blog', $request->file('image'));
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
        return view('blog.posts.edit', compact('categories', 'post', 'tags'));
    }

    public function updatePost(Request $request, $id)
    {
        $userId = Auth::User()->userId;

        $this->validate($request, array(
            'title'         => 'required',
            'category_id'   => 'required',
            'description' => 'required',
            'title_fr' => 'required',
            'description_fr' => 'required',
        ));

        $post = BlogPost::find($id);
        $post->fill($request->all());
        $post->slug = str_slug($request->title);
        $post->userId = $userId;

        if ($request->hasFile('image')) {
            $post->image = ImageUpload::upload('/upload/blog', $request->file('image'));
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
        return view('blog.categories.edit', ['category' => new BlogCategory()]);
    }

    public function storeCategory(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required',
            'name_fr' => 'required',
        ));

        $category = new BlogCategory;
        $category->fill($request->all());
        $category->save();

        Session::flash('success_msg', 'Category Created Successfully');
        return redirect(route('blog.categories'));
    }

    public function editCategory($id)
    {
        $category = BlogCategory::find($id);;
        return view('blog.categories.edit', compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {
        $this->validate($request, array(
            'name' => 'required',
            'name_fr' => 'required',
        ));

        $category = BlogCategory::find($id);

        $category->fill($request->all());

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
