<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogCategory;
use App\BlogPost;
use App\BlogTag;
use App;
class BlogFrontController extends Controller
{

    private function sidebar(){
        $categories = BlogCategory::where('status', 'Active')->get();

        $recentPosts = BlogPost::orderBy('created_at', 'desc')->where('status', 'Active')->take(3)->get();
        $recentPosts_results = [];
        foreach ($recentPosts as $post) {
            if (App::getLocale() == 'fr') {

                $post->title = $post->title_fr;
                $post->description = $post->description_fr;
            }
            $recentPosts_results[] = $post;
        }
        $categories_results = [];
        foreach ($categories as $category) {
            if (App::getLocale() == 'fr') {
                $category->name = $category->name_fr;
                $category->description = $category->description_fr;
            }
            $categories_results[] = $category;
        }

        $tags = BlogTag::all();
        return view('blog.sidebar', [
            'categories' => $categories,
            'recentPosts' => $recentPosts,
            'recentPosts_results' => $recentPosts_results,
            'categories_results' => $categories_results,
            'tags' => $tags,
        ]);
    }

    public function index()
    {
        $posts = BlogPost::orderBy('id', 'desc')->where('status', 'Active')->paginate(5);
        $posts_results = [];
        foreach ($posts as $post) {
            if (App::getLocale() == 'fr') {
                $post->title = $post->title_fr;
                $post->description = $post->description_fr;
            }
            $posts_results[] = $post;
        }
        return view('blog.index', [
            'posts' => $posts,
            'posts_results' => $posts_results,
            'sidebar' =>$this->sidebar()
        ]);
    }


    public function show($id)
    {
        $post = BlogPost::find($id);
        $sidebar = $this->sidebar();
        return view('blog.show', compact('post', 'sidebar'));
    }

    public function search(Request $request)
    {

        $keyWord =  $request->input('search');
        $post = BlogPost::where('title', 'LIKE', "%{$keyWord}%")->first();
        $sidebar = $this->sidebar();

        return view('blog.search', compact('post', 'sidebar'));
    }

    public function autocomplete(Request $request)
    {
        $term = $request->term;
        $items = BlogPost::select("title")->where("title", "LIKE", "%{$term}%")->get();
        foreach ($items as $key => $value) {
            $searchResults[] = $value['title'];
        }

        return $searchResults;
    }



    public function getTagPosts($id)
    {
        $posts = BlogPost::orderBy('id', 'desc')->where('id', $id)->get();
        $tag = BlogTag::find($id);
        $sidebar = $this->sidebar();

        return view('blog.tagPosts', compact('posts', 'sidebar'));
    }

    public function getCategoryPosts($id)
    {
        $posts = BlogPost::orderBy('id', 'desc')->where('category_id', $id)->get();
        $sidebar = $this->sidebar();
        return view('blog.categoryPosts', compact('posts','sidebar'));
    }


}