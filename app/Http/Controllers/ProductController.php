<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
	/**
     * Add Cart View With Rendor.
     *
     * @param  string  $key
     * @return void
     */
    public function addToCart(Request $request)
    {	  
        foreach ($request->formData ?? [] as $key => $value) {
            if (array_key_exists('address', $value) && empty($value['address'])) {
                return response()->json(['error'=>'Address is required.']);
            }
            if (array_key_exists('neighborhood', $value) && empty($value['neighborhood'])) {
                return response()->json(['error'=>'Neighborhood Address is required.']);
            }

        }
        
    	if ($request->type == 'get-cart'){

			$cart = Session::get('cart');

            $quantity = $total = 0;

            if($cart){
            	foreach($cart as $id => $details){
            		$total += $details['price'] * $details['quantity'];
            		$quantity += $details['quantity'];
            	}
            }

            $ajaxView = view('ajaxView.cart')
            				->with([
            					'cart' => $cart,
            					'total' => $total
            				])
            				->render();

            return response()->json([
	            	'ajaxView' => $ajaxView,
                    'subTotal' => $total,
	            	'total' => $total + amountGst($total),
	            	'quantity' => $quantity,
                    'gst' => '$'.amountGst($total).'('.getSettingValue('home-product-gst').'%)',
	            	]);

    	}else{
            $ajaxView = '';

            foreach ($request->formData as $key => $value) {
    	    	$product = Product::find($value['product_id']);

    	    	if(!$product) {
    	            abort(404);
    	        }

    	        $cart = Session::get('cart') ?? [];

                $cart[] = [
                        "product_id" => $value['product_id'],
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "actual_price" => $product->actual_price ?? $product->price,
                        "image" => $product->image,
                        "product_code" => $product->product_code,
                        "neighborhood" => $value['neighborhood'] ?? '',
                        "extra_option" => $value['extra_option'] ?? '',
                        "address" => $value['address'] ?? '',
                        "custom_design_file_upload" =>$value['custom_design_file_upload'] ?? '',
                        "pro_type" => $value['pro_type'] ?? '',
                    ];

    	            Session::put('cart', $cart);

    	            $quantity = $total = 0;

                	foreach($cart as $id => $details){
                		$total += $details['price'] * $details['quantity'];
                		$quantity += $details['quantity'];
                	}

    	            $ajaxView = view('ajaxView.cart')
    	            			->with([
    	            					'cart'=>$cart,
    	            					'total'=>$total
    	            				])
    	            			->render();
            }

	        return response()
	            		->json([
	            			'ajaxView'=>$ajaxView,
	            			'total'=>$total,
	            			'quantity'=>$quantity
	            		]);
    	}
    }

    /**
     * Delete Cart.
     *
     * @param  string  $key
     * @return void
     */
    public function deleteToCart(Request $request)
    {
    	$cart = Session::get('cart');

    	if(isset($cart[$request['delete_id']])){
    		unset($cart[$request['delete_id']]);
    		Session::put('cart', $cart);
    	}

    	return response()->json(['success'=>'done']);
    }

    /**
     * Ajax View Get Cart Popup Box.
     *
     * @param  string  $key
     * @return void
     */
    public function ajaxViewPopup(Request $request)
    {
    	$product = Product::where('id',$request->id)->first();

    	$ajaxView = view('ajaxView.popupModel')->with(['product'=>$product])->render();

	    return response()->json(['ajaxView'=>$ajaxView]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function fileUpload(Request $request)
    {   
        $file = $request->file('file');
        $filename = rand(1,99).str_replace('',' ',$file->getClientOriginalName());
        $file->move(public_path('/upload/cartFile'), $filename);

        return response()->json(['success'=>$filename]);
    }
}
