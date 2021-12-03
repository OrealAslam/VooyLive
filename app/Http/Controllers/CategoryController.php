<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class CategoryController extends Controller
{
    public function order($slug)
    {
    	$categories = Category::orderBy('type','asc')->get();
    	$category = Category::where('slug',$slug)->first();
        $products = $category->product()->paginate(5);
    	return view('order',compact('categories','products','slug','category'));
    }

    public function orderDetail($id)
    {
    	$product = Product::find($id);
    	$reletedProduct = Product::whereNotIn('id',[$id])->where('cat_id',$product->category->id)->inRandomOrder()->take(3)->get();
    	$images = '';
    	if ($product->category->type == 0 && !empty($product->productGallery->image)) {
    		$images = explode(',', $product->productGallery->image);
    	}
    	return view('orderDetail',compact('product','images','reletedProduct'));
    }
}
