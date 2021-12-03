<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Stripe;
use App\Transactions;
use App\Credit;
use App\UserDebit;
use App\User;
use App\PaymentHistory;
use App\UserProduct;
use App\DiscountCode;
use App\Category;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Session;
use App\SmtpSetting;
class PaymentController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function payment()
    {
    	if(auth()->check()){
            if(!empty(Session::has('cart'))){
                
                $cart = Session::get('cart');
                $quantity = $total =  $actualPrice = 0;
                if(session('cart')){
                    foreach(session('cart') as $id => $details){
                        $total += $details['price'] * $details['quantity'];
                        $actualPrice =  $details['actual_price'] + $actualPrice;
                    }
                }

                $totalPrice = $total + amountGst($total);

                $user = User::where('userId',Auth::user()->userId)->first();

                $finalTotalCredit = $user->userCredit();

        		return view('payment',compact('user','totalPrice','finalTotalCredit','actualPrice'));
            }else{
                return redirect()->route('home');    
            }
    	}else{
    		return redirect()->route('login');
    	}
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function paymentStore(Request $request)
    {
    	$input = $request->all();
        $cart = Session::get('cart');
        $user = Auth::user();

        $category = Category::where('type',1)->first();

        if(checkProductOrCredit() == 1){
            try {

                // Stripe Api Refrences
                \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

                // Create Stripe Customer
                if (is_null($user->stripe_id)) {
                    $customer = \Stripe\Customer::create(array(
                        'source'   => $input['stripeToken'],
                        'email'    => $user->email,
                    ));
                    $user->update(['stripe_id' => $customer->id]);
                }

                $totalAmount = $actualPrice  = 0;

                if(session('cart')){
                    foreach(session('cart') as $id => $details){
                        $totalAmount += $details['price'] * $details['quantity'];
                        $actualPrice =  $details['actual_price'] + $actualPrice;
                    }
                }

                $totalPrice = $totalAmount + amountGst($totalAmount);

                // Payment Create
                $charge = \Stripe\Charge::create(array(
                    'customer'    => $user->stripe_id,
                    "amount" => $totalPrice * 100,
                    "currency" => "cad",
                    "description" => "Payment from" 
                ));

                if (!empty($charge) && $charge->status == 'succeeded') {
                    $product = json_encode($cart);

                    $payment = PaymentHistory::create([
                        "user_id" => Auth::user()->userId,
                        "category_type" => 0,
                        "amount" => $totalAmount,
                        "total_amount" => $charge->amount / 100,
                        "payment_type" => checkProductOrCredit(),
                        "stripe_response" => json_encode($charge),
                        "credit_detail" => NULL,
                        "products" => $product
                    ]);

                    $productdata = json_decode($product);
                    $productId = [];
                    foreach ($productdata as $key => $value){
                        $userProduct = UserProduct::create([
                            "payment_history_id" =>  $payment->id,
                            "user_id" =>  Auth::user()->userId,
                            "product_id" =>  $value->product_id,
                            "product_type" => 0,
                            "amount" => $value->price,
                            "introduction" => $input['introduction'],
                        ]);
                    }


                    $credit = Credit::create([
                        'user_id' => Auth::user()->userId,
                        'type' => 'product',
                        'credit' => $actualPrice
                    ]);

                    $credit->use = 0;
                    Session::forget('cart');
                }

            } catch (Exception $e) {
                \Log::info('Payment Error: '. $e->getMessage());
                return redirect()->route('home'); 
            }

        }elseif(checkProductOrCredit() == 0 && $user->userCredit() > getCartPrices()['totalPrice']){
            try {
                $discountCode = DiscountCode::where('code',$input['code'])->first();

                if (!empty($discountCode)) {
                    $discounPrice = $discountCode->value;
                    $totalDiscountPrice = $input['pre-amount'] * $discountCode->value / 100;
                }

                $totalAmount = getCartPrices()['total'];

                $product = json_encode($cart);

                // Pay Amount
                $payAmount = $input['amount'];

                $total = $input['pre-amount'];

                $finalTotalCredit = $user->userCredit();

                // User Credit
                $credit = ['use'=>$payAmount, 'credit'=> $finalTotalCredit, 'remaining_credit'=> $finalTotalCredit - $payAmount];

                // Store PaymentHistory User
                $payment = PaymentHistory::create([
                    "user_id" => Auth::user()->userId,
                    "category_type" => $input['category_type'],
                    "amount" => $total,
                    "total_amount" => $payAmount,
                    "payment_type" => $input['payment_type'],
                    "stripe_response" => Null,
                    "coupon_code_id" => $input['coupon_code_id'],
                    "coupon_code" => $input['code'],
                    "credit_detail" => json_encode($credit),
                    "products" => json_encode($cart)
                ]);

                foreach ($cart as $key => $value){
                    $userProduct = UserProduct::create([
                        "payment_history_id" =>  $payment->id,
                        "user_id" =>  Auth::user()->userId,
                        "product_id" =>  $value['product_id'],
                        "payment_type" => $input['payment_type'],
                        "product_type" => 1,
                        "amount" => $value['price'],
                        "neighborhood" => $value['neighborhood'],
                        "address" => $value['address'],
                        "extra_option" => $value['extra_option'],
                        "custom_design_file_upload" => $value['custom_design_file_upload'],
                        "introduction" => $input['introduction'],

                    ]);
                }

                $userDebit = UserDebit::create([
                    "user_id" => Auth::user()->userId,
                    "debit" => $payAmount,
                    "payment_history_id" => $payment->id,
                ]);


                // Clear Cart Forget Session
                Session::forget('cart');

            } catch (Exception $e) {
                \Log::info('Payment Error: '. $e->getMessage());
                return redirect()->route('home'); 
            }

        }else{
            try {
                $totalAmount = 0;
                if(session('cart')){
                    foreach(session('cart') as $id => $details){
                        $totalAmount += $details['price'] * $details['quantity'];
                    }
                }

                $discountCode = DiscountCode::where('code',$input['code'])->first();

                if (!empty($discountCode)) {
                    $discounPrice = $discountCode->value;
                    $totalDiscountPrice = $input['pre-amount'] * $discountCode->value / 100;
                }

                // Pay Amount

                $payAmount = $input['pre-amount'];

                $stripeAmount = $input['amount'];

                $credit = ['use'=> $user->userCredit(),'stripe' =>$stripeAmount,'total'=>$totalAmount,'remaining_credit'=>0];

                // Stripe Api Refrences
                \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

                $product = json_encode($cart);

                $productdata = json_decode($product);

                if (empty($productdata)) {
                    return back();
                }

                // Create Stripe Customer
                if (is_null($user->stripe_id)) {

                    if (empty($input['stripeToken'])) {
                        return back();
                    }

                    $customer = \Stripe\Customer::create(array(
                        'source'   => $input['stripeToken'],
                        'email'    => $user->email,
                    ));
                    
                    $user->update(['stripe_id' => $customer->id]);
                }

                \Stripe\Customer::createSource(
                    $user->stripe_id,
                    ['source' => $input['stripeToken']]
                );

                // Payment Create
                $charge = \Stripe\Charge::create(array(
                    'customer'    => $user->stripe_id,
                    "amount" => $stripeAmount * 100,
                    "currency" => "cad",
                    "description" => "Payment from" 
                ));

                if (!empty($charge) && $charge->status == 'succeeded') {
                    // Store PaymentHistory User
                    $payment = PaymentHistory::create([
                        "user_id" => Auth::user()->userId,
                        "category_type" => 1,
                        "amount" => $payAmount,
                        "total_amount" => $stripeAmount,
                        "payment_type" => $input['payment_type'],
                        "stripe_response" => json_encode($charge),
                        "coupon_code_id" => $input['coupon_code_id'],
                        "coupon_code" => $input['code'],
                        "credit_detail" => json_encode($credit),
                        "products" => json_encode($cart)
                    ]);


                    if ($user->userCredit() != 0) {
                        $userDebit = UserDebit::create([
                            "user_id" => Auth::user()->userId,
                            'debit' => $user->userCredit(),
                            'payment_history_id' => $payment->id
                        ]);
                    }
                    $product = json_encode($cart);

                    $productdata = json_decode($product);

                    $productId = [];
                    foreach ($productdata as $key => $value){
                        $userProduct = UserProduct::create([
                            "payment_history_id" =>  $payment->id,
                            "user_id" =>  Auth::user()->userId,
                            "product_id" =>  $value->product_id,
                            "product_type" => 1,
                            "amount" => $value->price,
                            "neighborhood" => $value->neighborhood,
                            "address" => $value->address,
                            "extra_option" => $value->extra_option,
                            "custom_design_file_upload" => $value->custom_design_file_upload,
                            "introduction" => $input['introduction'],
                        ]);
                    }

                    // Clear Cart Forget Session
                    Session::forget('cart');

                }
            } catch (Exception $e) {
                \Log::info('Payment Error: '. $e->getMessage());

                return redirect()->route('home'); 
            }
        }

        if (!is_null($payment)) {

            $user = User::where('userId',Auth::user()->userId)->first();

            $productdata = json_decode($product);

            $credit = json_decode($payment->credit_detail);

            $date = Carbon::now();
            $date->addDays(3);
            $date->format("Y-m-d");
            $data  = SmtpSetting::first();
            $datas = [
                'email' => $user['email'],
                'firstName' => $user['firstName'],
                'lastName' => $user['lastName'],
                'payment' => $payment,
                'productdata' => $productdata,
                'credit' => $credit,
                'actualPrice' => $actualPrice ?? '',
                'deliveryData' => $date,
                'discountPrice' => $totalDiscountPrice ?? '',
                'discountCode' => $input['code'] ?? '',
                'totalAmount' => $totalAmount ?? '',
                'introduction' => $input['introduction'],
                'category' => $category,
                'admin_email'=>$data->mail_admin_email
            ];

            try {
                
                \Mail::send('emails.cartProduct', $datas, function($message) use ($datas) 
                {
                    $message->to($datas['email']);
                    $message->subject(''.$datas['firstName'].' thank you for your order');
                });
                \Mail::send('emails.cartProduct', $datas, function($message) use ($datas) 
                {
                    $message->to($datas['admin_email']);
                    $message->subject('You received new order.');
                });
            } catch (Exception $e) {
                \Log::info('Payment Error: '. $e->getMessage());

                return redirect()->route('home'); 
            }
        }

        Session::put('payment', $payment);

        return redirect()->route('profileview')->with(['payment'=>$payment]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function renewCouponCodeVerify(Request $request)
    {
        if($request->ajax()){
            $couponCode = DiscountCode::where('code',$request->code)->first();
            if (!is_null($couponCode)) {
                $validDate = Carbon::now()->between(Carbon::parse($couponCode->startDate), Carbon::parse($couponCode->endDate));
                if ($couponCode->type != 'percent') {
                    return response()->json(['coupon' => '', 'status' => '3']);
                }elseif ($validDate != 1) {
                    return response()->json(['coupon' => '', 'status' => '5']);
                }elseif ($couponCode->status == 1) {
                     $paymentHistory = PaymentHistory::where('user_id',auth()->user()->id)->where('coupon_code_id',$couponCode->id)->first();
                     if (!is_null($paymentHistory) && $paymentHistory->coupon_code == $request->code) {
                        return response()->json(['coupon' => '', 'status' => '4', 'id' => '']);
                     }
                    return response()->json(['coupon' => $couponCode, 'status' => '1', 'id' => $couponCode->id]);
                }elseif ($couponCode->status == 0) {
                    return response()->json(['coupon' => '', 'status' => '2']);
                }
            }else{
                return response()->json(['coupon' => '', 'status' => '3']);
            }
           
        }
    }
}