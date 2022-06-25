<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\ImageUpload;
use Session;

class SettingController extends Controller
{
    public function index()
    {
    	$settingData = Setting::get()->toArray();

        $setting = [];
        foreach ($settingData as $key => $value) {
            $setting[$value['slug']] = $value;
        }

        return view('admin.setting.index',compact('setting'));
    }

    public function update(Request $request)
    {
        $input = $request->all();

        if ($request->hasFile('popup-image')) {
            $image = $request->file('popup-image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = 'upload/popupImage/';
            $image->storeAs($destinationPath, $name);
            $input['popup-image'] = $name;
        }

        if ($request->hasFile('property-featuresheets-image')) {
            $image = $request->file('property-featuresheets-image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = 'upload/productImageSetting/';
            $image->storeAs($destinationPath, $name);
            $input['property-featuresheets-image'] = $name;
        }

        if ($request->hasFile('home-details-infographic-image')) {
            $image = $request->file('home-details-infographic-image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = 'upload/productImageSetting/';
            $image->storeAs($destinationPath, $name);
            $input['home-details-infographic-image'] = $name;
        }

        if ($request->hasFile('community-feature-sheet-image')) {
            $image = $request->file('community-feature-sheet-image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = 'upload/productImageSetting/';
            $image->storeAs($destinationPath, $name);
            $input['community-feature-sheet-image'] = $name;
        }

        if ($request->hasFile('product-detail-image')) {
            $image = $request->file('product-detail-image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = 'upload/productImageSetting/';
            $image->storeAs($destinationPath, $name);
            $input['product-detail-image'] = $name;
        }

        if ($request->hasFile('market-sentiment-survey-image')) {
            $image = $request->file('market-sentiment-survey-image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = 'upload/productImageSetting/';
            $image->storeAs($destinationPath, $name);
            $input['market-sentiment-survey-image'] = $name;
        }

        if ($request->hasFile('home-slider-image')) {
            $image = $request->file('home-slider-image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = 'upload/productImageSetting/';
            $image->storeAs($destinationPath, $name);
            $input['home-slider-image'] = $name;
        }

        if ($request->hasFile('survey-share-image')) {
            $image = $request->file('survey-share-image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = 'upload/productImageSetting/';
            $image->storeAs($destinationPath, $name);
            $input['survey-share-image'] = $name;
        }

        foreach ($input as $key=>$value){
           Setting::where('slug',$key)->update(array('value'=>$value));  
        }

        Session::flash('success_msg', 'Setting Data Upate Successfully');
        return redirect()->back();
    }
}
