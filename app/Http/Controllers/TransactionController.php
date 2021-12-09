<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserProduct;
use App\UserProductDetail;
use App\Order;
use App\Category;
use Auth;

class TransactionController extends Controller
{	

	public function transactions(){

        $data['user']=Auth::User();

        $data['sidebar']=view('account.accountSidebar',$data);

        if(Auth::User()->user_type == 1){
          $clientList = getClientList(Auth::User()->userId);
          $data['transactions']  =  Order::whereIn('userId',$clientList)->paginate(config('app.paginate'));
        }else{
          $data['transactions'] = Auth::User()->orders()->paginate(config('app.paginate'));
        }

        $data['product'] = UserProduct::latest()->where('user_id',Auth::User()->userId)->get();
        
        $data['name'] = 'communityFeatureSheet';
        
        $data['cat'] = Category::orderBy('type','asc')->first();
        
        return view('account.transactions',$data);
    }

	public function transactioProductDetail($id)
	{
		$product = UserProduct::where('id',$id)->latest()->first();
		return view('account.transactionProductDetail',compact('product'));
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userProductDetailDownloadPdf($fileName)
    {
      return response()->download(storage_path('/app/public/userProductDetail/'.$fileName));
    }
}