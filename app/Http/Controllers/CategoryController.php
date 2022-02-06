<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App;

class CategoryController extends Controller
{
    public function order($slug)
    {
    	$categories = Category::orderBy('type','asc')->get();
		$categories_results = [];
        foreach ($categories as $category) {
            if (App::getLocale() == 'fr') {

                $category->title = $category->title_fr;
            }
            $categories_results[] = $category;
        }
    	$category = Category::where('slug',$slug)->first();
		if (App::getLocale() == 'fr') {

			$category->title = $category->title_fr;
		}
        $products = $category->product()->paginate(5);
		$products_results = [];
        foreach ($products as $product) {
            if (App::getLocale() == 'fr') {

                $product->name = $product->name_fr;
				$product->description = $product->description_fr;
            }
            $products_results[] = $product;
        }
    	return view('order',compact('categories','products','slug','category','categories_results','products_results'));
    }

    public function orderDetail($id)
    {
    	$product = Product::find($id);
		if (App::getLocale() == 'fr') {

			$product->name = $product->name_fr;
			$product->description = $product->description_fr;
		}

    	$reletedProduct = Product::whereNotIn('id',[$id])->where('cat_id',$product->category->id)->inRandomOrder()->take(3)->get();
		$reletedProduct_results = [];
        foreach ($reletedProduct as $reletedProduct) {
            if (App::getLocale() == 'fr') {

                $reletedProduct->name = $reletedProduct->name_fr;
				$reletedProduct->description = $reletedProduct->description_fr;
            }
            $reletedProduct_results[] = $reletedProduct;
        }
    	$images = '';
    	if ($product->category->type == 0 && !empty($product->productGallery->image)) {
    		$images = explode(',', $product->productGallery->image);
    	}
    	return view('orderDetail',compact('product','images','reletedProduct','reletedProduct_results'));
    }
}
