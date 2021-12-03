<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Survey;
use App\User;
use Auth;
use Validator;
use Session;

class SurveyController extends Controller
{
    public function survey()
    {
    	$data = Survey::where('userId',Auth::User()->userId)->latest()->first();

        $createdDate = '';
        $checkWeekSurvey = true;
        if(!empty($data->created_at)){
            $createdDate = $data->created_at;
            $currentDate = date('Y-m-d');
            $currentDate = date('Y-m-d', strtotime($currentDate));
               
            $startDate = date('Y-m-d', strtotime($createdDate->startOfWeek()));
            $endDate = date('Y-m-d', strtotime($createdDate->endOfWeek()));
            
            if(($currentDate >= $startDate) && ($currentDate <= $endDate)){
                $checkWeekSurvey = false;
                if (auth()->user()->is_allow_multiple_survey == 1) {
                    $checkWeekSurvey = true;
                }
            }
        }

    	return view('survey',compact('data','checkWeekSurvey'));
    }

    public function surveyStore(Request $request)
    {
    	$input = $request->all();

    	$input = array_except($request->all(), ['_token']);

        $validator = Validator::make($input, [
            'listing_appointments_this_week' => 'required',
            'property_this_week' => 'required',
            'escrow_this_week' => 'required',
            'transaction_close_this_week' => 'required',
            'coronavirus' => 'required',
            'expecting_lower_prices' => 'required',
            'buyers_withdraw' => 'required',
            'market_completely_this_week' => 'required',
            'attract_buyers_this_week' => 'required',
            'transaction_fall_escrow_this_week' => 'required',
            'transaction_first_time_buyer' => 'required',
            'next_week_listing_will_go' => 'required',
            'next_week_sales_will_go' => 'required',
            'next_week_prices_will_go' => 'required',
            'transactions_typical_year' => 'required',
            'constitutes_majority_of_business' => 'required',
            'real_estate_team' => 'required',
            'size_of_your_brokerage' => 'required',
            'canadian_city' => 'required',
        ],
        [
            'listing_appointments_this_week.required' => 'The Did you do any listing appointments this week? field is required.',
            'property_this_week.required' => 'The Did you list a property this week? field is required.',
            'escrow_this_week.required' => 'The Did you enter escrow this week? field is required.',
            'transaction_close_this_week.required' => 'The Have you had a transaction close this week? field is required.',
            'coronavirus.required' => 'The Have you had any clients holding back from selling because of Coronavirus? field is required.',
            'expecting_lower_prices.required' => 'The Were home buyers you interacted with this week expecting lower prices? field is required.',
            'buyers_withdraw.required' => 'The Have you had any buyers withdraw an offer this week? field is required.',
            'market_completely_this_week.required' => 'The Have you seen any sellers remove their home from the market completely this week? is required.',
            'attract_buyers_this_week.required' => 'The Have any of your home sellers reduced price to attract buyers this week? is required.',
            'transaction_fall_escrow_this_week.required' => 'The Have you had a transaction fall out of escrow this week? is required.',
            'transaction_first_time_buyer.required' => 'The Was the buyer in your last closed transaction a first-time buyer? is required.',
            'next_week_listing_will_go.required' => 'The Do you think next week listings will go: is required.',
            'next_week_sales_will_go.required' => 'The Do you think next week sales will go: is required.',
            'next_week_prices_will_go.required' => 'The Do you think next week prices will go: is required.',
            'transactions_typical_year.required' => 'The How many transactions (sides) do you close in a typical year? Please enter numbers only. is required.',
            'constitutes_majority_of_business.required' => 'The Which of the following constitutes the majority of your business? is required.',
            'real_estate_team.required' => 'The Are you currently working as a member of a real estate team? is required.',
            'size_of_your_brokerage.required' => 'The What is the size of your brokerage? is required.',
            'canadian_city.required' => 'The Select your city (Canadian Cities Only) is required.',
        ]);

        if($validator->passes()){

        	$input['userId'] = Auth::User()->userId;

    		Survey::create($input);

            $succesSurvey = 'succesSurvey';

            session()->put('succesSurvey', $succesSurvey);
        	return redirect()->route('survey')->with(['succesSurvey'=>$succesSurvey]);
        }

        return redirect()->back()->withErrors($validator)->withInput();
    }

    public function mySurvey()
    {
        $surveys = Survey::where('userId',Auth::User()->userId)->latest()->paginate(config('app.paginate'));
        return view('account.mySurvey',compact('surveys'));
    }

    public function mySurveyShow(Survey $survey)
    {
        $creationDate = $survey->created_at;

        //get user
        $user = User::where('userId', $survey->userId)->first();

        // get week start date and end date and month name
        $monthName = \Carbon\Carbon::parse($creationDate)->format('F');
        $weekStartDate = \Carbon\Carbon::parse($creationDate->startOfWeek())->format('d');
        $weekEndDate = \Carbon\Carbon::parse($creationDate->endOfWeek())->format('d');

        return view('account.mySurveyShow',compact('survey','creationDate','user','monthName','weekStartDate','weekEndDate'));
    }

    public function surveyShowTest(Request $request)
    {
        $firstWeek = date("M",strtotime('next Monday -1 week')).' '.date("d",strtotime('next Monday -1 week')).'-'.date("d",strtotime(date("Y-m-d",strtotime('next Monday -1 week'))." +6 days"));
        $secondWeek = date("M",strtotime('sunday',strtotime('last week'))).' '.date("d",strtotime('monday',strtotime('last week'))).'-'.date("d",strtotime('sunday',strtotime('last week')));
        $thiredWeek = date("M",strtotime('next Monday -3 week')).' '.date("d",strtotime('next Monday -3 week')).'-'.date("d",strtotime(date("Y-m-d",strtotime('next Monday -3 week'))." +6 days"));
        return view('admin.survey.mySurvey',compact('firstWeek','secondWeek','thiredWeek'));  
    }

    public function inviteAnotherRealtor()
    {
        return view('account.inviteRelatorSurvey');
    }

    public function inviteRealtor(Request $request)
    {
        $input = $request->all();

        $datas = [
            'email' => $input['email'],
        ];

        \Mail::send('emails.inviteRealtor', $datas, function($message) use ($datas) 
        {
            $message->to($datas['email']);
            $message->subject(getSettingValue('survey-invite-another-realtor-mail-subject'));
        });

        Session::flash('success_msg', 'Survey Invite Mail Send Successfully');
        return redirect()->back();
    }
}
