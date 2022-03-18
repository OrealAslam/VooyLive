<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Mail;
use App\UserProductDetail;
use App\UserProduct;
use App\ImageUpload;
use App\Category;
use App\User;
use Validator;
use Session;
use Exception;

class UserPurchesProductController extends Controller
{	
	/**
     * UserPurchesProduct List.
     *
     * @param  string  $key
     * @return void
     */
    public function userProductDetailIndex(Request $request,$id)
    {   
        $productDetail = UserProduct::find($id);
        $userProductDetail = UserProductDetail::where('user_product_id',$id)->get();
        if ($request->ajax()) {
            return Datatables::of($userProductDetail)

                    ->addColumn('action', function($userProductDetail){
	                    $btn = '';
	                    $btn .= '<form action="'.route('user.product.detail.destroy',[$userProductDetail->id]) .'" method="POST" style="display:contents">';
	                    $btn .= '<input type="hidden" name="_method" value="DELETE">';
	                    $btn .= csrf_field();
	                    $btn .= '<button class="btn btn-danger btn-sm remove-customer" type="submit"><span class="fa fa-remove"></span></button>';
	                    $btn .= '</form>';
	                    return $btn;
	                })

                    ->addColumn('file', function($userProductDetail){
                        $file = '';
                        if (!empty($userProductDetail->file)) {
                            foreach (json_decode($userProductDetail->file) as $key => $value) {
                                $file .= '<i class="fa fa-file-pdf-o" aria-hidden="true" style="font-size:35px;color:red;margin-bottom:5px;"></i>';
                            }
                            return $file;
                        }
	                })

                    ->addColumn('note', function($userProductDetail){
                        return $userProductDetail->note;
                    })

                    ->rawColumns(['action','file','note'])
                    ->make(true);
        }

        return view('admin.eCommerce.userPurchesProduct.index',compact('id','productDetail'));
    }

    /**
     * UserPurchesProduct Create.
     *
     * @param  string  $key
     * @return void
     */
    public function userProductDetailCreate($id)
    {
        $userProductDetail = UserProduct::where('id',$id)->first();

        $userdata = User::where('userId',$userProductDetail['user_id'])->first();

        $userName = $userdata['firstName'];

        return view('admin.eCommerce.userPurchesProduct.create',compact('id','userName','userdata'));
    }

    /**
     * UserPurchesProduct Store.
     *
     * @param  string  $key
     * @return void
     */
    public function userProductDetailStore(Request $request)
    {   
        $input = $request->all();

        $userId = UserProduct::where('id',$input['user_product_id'])->first();

        $product = UserProduct::where('id',$input['user_product_id'])->first();

        $validator = Validator::make($input,[
            'note' => 'required',
            'file' => 'required',
            'emails' => 'required',
        ]);

        if($validator->passes()){

            if($request->hasfile('file'))
            {
                foreach($request->file('file') as $image)
                {   
	                $inputFile = ImageUpload::uploadWithExtension('userProductDetail/',$image);
                    $data[] = $inputFile; 
                }
            }

            if(!empty($input['emails'])){
                foreach($input['emails'] as $email)
                {   
                    $dataEmail[] = $email; 
                }
            }

            $input['file'] = json_encode($data);
            $input['emails'] = json_encode($dataEmail);

            UserProductDetail::create($input);

            $user = User::where('userId',$userId['user_id'])->first();
            
            // file data            
            $file = json_decode($input['file']);

            // emails data
            $emails = json_decode($input['emails']);
            $emEmail = implode(" ",$emails);
            $exEmail = explode(',',$emEmail);

            $userCredit = number_format($user->userCredit(),2);

            $orderMoreCredit = Category::where('type',1)->first();

            $datas = [
                'firstName' => $user->firstName,
                'lastName' => $user->lastName,
                'email' => $user->email,
                'note' => $input['note'],
                'file' => $file,
                'emails' => $exEmail,
                'productName' => $product->product['name'],
                'address' => $product->address,
                'neighborhood' => $product->neighborhood,
                'userCredit' => $userCredit,
                'orderMoreCredit' => $orderMoreCredit,
            ];

            $successMessage = 'User Product Store Successfully, We sent mail successfully.';

            try {
                
                Mail::send('emails.userPurchesProduct', $datas, function($message) use ($datas) 
                {
                    foreach($datas['emails'] as $emails){
                        $message->to($emails);
                    }
                    $message->subject('Delivery Update');
                });
            } catch (Exception $e) {
                $successMessage = 'User Product Store Successfully, mail sent fail because '. $e->getMessage();
            }

            Session::flash('success_msg', $successMessage);
            return redirect()->route('user.product.detail.index',$input['user_product_id']);
        }

        return redirect()->back()->withErrors($validator)->withInput(); 
    }

    /**
     * UserPurchesProduct Delete.
     *
     * @param  string  $key
     * @return void
     */
    public function userProductDetailDestroy($id)
    {
    	UserProductDetail::find($id)->delete();
        Session::flash('success_msg', 'User Product Delete Successfuly');
        return redirect()->back();
    }
}