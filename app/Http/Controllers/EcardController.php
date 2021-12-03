<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use App\EcardPhoto;

class EcardController extends Controller
{
    public function frontEcardsCreate()
    {
    	return view('account.ecardsCreate');
    }

    public function frontEcardsDemo()
    {
    	$ecard = EcardPhoto::get();
    	return view('account.ecardsDemo',compact('ecard'));
    }

    public function frontEcardsDemoStore(Request $request)
    {
    	$input = $request->all();
    	$ecard = EcardPhoto::find($input['image']);
    	$img = \Image::make(public_path('upload/ecard/blank/'.$ecard->blank_image));
    	// dd($ecard);
    	// dd($input);
    	if (!is_null($input['a_greeting']) && !is_null($ecard->x_greeting_coordinate) && !is_null($ecard->y_greeting_coordinate)) {
	    	$img->text($input['a_greeting'], $ecard->x_greeting_coordinate, $ecard->y_greeting_coordinate, 
	    	function($font) {
	    		$font->file(public_path('upload/ecard/font/ArialMdmItl.ttf'));
	            $font->size(25);
	            $font->color('ff0000');
	        });
    	}

    	if (!is_null($input['salutation']) && !is_null($ecard->x_solution_coordinate) && !is_null($ecard->y_solution_coordinate)) {
	    	$img->text($input['salutation'], $ecard->x_solution_coordinate, $ecard->y_solution_coordinate, 
	    	function($font) {
	    		$font->file(public_path('upload/ecard/font/ARIAL.TTF'));
	            $font->size(12);
	            $font->color('000000');
	        });
    	}

    	if (!is_null($input['message']) && !is_null($ecard->x_message_coordinate) && !is_null($ecard->y_message_coordinate)) {
	    	$img->text($input['message'], $ecard->x_message_coordinate, $ecard->y_message_coordinate, 
	    	function($font) {
	    		$font->file(public_path('upload/ecard/font/ARIAL.TTF'));
	            $font->size(12);
	            $font->color('000000');
	        });
    	}

    	if (!is_null($input['signature']) && !is_null($ecard->x_signature_coordinate) && !is_null($ecard->y_signature_coordinate)) {
	    	$img->text($input['signature'], $ecard->x_signature_coordinate, $ecard->y_signature_coordinate, 
	    	function($font) {
	    		$font->file(public_path('upload/ecard/font/ArialMdmItl.ttf'));
	            $font->size(15);
	            $font->color('ff0000');
	        });
    	}

        $printImageName = 'complete_'.$ecard->blank_image;

        $img->save(public_path('/upload/ecard/complete/'.$printImageName));

    	return view('account.ecardaImagePreview',compact('printImageName'));
    }
}
