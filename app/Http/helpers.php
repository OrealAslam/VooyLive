<?php

use App\Setting;
use App\Frsetting;
use App\Logo;
use App\Testimonial;
use App\Category;
use App\User;
use App\Plan;
use App\Survey;
/**
 * Write code on Method
 *
 * @return response()
 */
function getSettingValue($slug)
{
    $locale = App::getLocale();
    if($locale == 'fr')
  	$setting = Frsetting::where('slug',$slug)->first();
      else
  	$setting = Setting::where('slug',$slug)->first();
    if(!$setting){
  	    $setting = Setting::where('slug',$slug)->first();
    }
  	return $setting->value;
}

/**
 * Write code on Method
 *
 * @return response()
 */
function amountGst($amountGst)
{
  	$gstPrice = getSettingValue('home-product-gst');
  	$amountGstPrice = $amountGst * $gstPrice / 100;
  	return $amountGstPrice;
}

/**
 * Write code on Method
 *
 * @return response()
 */
function getLogoList()
{
  $logo = Logo::latest()->get();
  return $logo;
}

/**
 * Write code on Method
 *
 * @return response()
 */
function getTestimonialList()
{
  	$testimonial = Testimonial::latest()->get();
  	return $testimonial;
}

/**
 * Write code on Method
 *
 * @return response()
 */
function orderCategory()
{
	$cat = Category::orderBy('type','asc')->first();
    return $cat;
}

/**
 * Write code on Method
 *
 * @return response()
 */
function orderCategoryCredit()
{
  $cat = Category::orderBy('type','dec')->first();
    return $cat;
}

/**
 * Write code on Method
 *
 * @return response()
 */
function getClientList($id)
{
  $userlist = User::where('parent_id',$id)->get();
  $userlistId = [''];

  if(!empty($userlist)){
      foreach ($userlist as $key => $value) {
        $userlistId[$key]  = $value->userId;
      }
  }

  array_push($userlistId,$id);

  return $userlistId;
}

/**
 * Write code on Method
 *
 * @return response()
 */
function checkPlan($parent_id)
{
    $user = User::where('userId',$parent_id)->first();
    
    if(!is_null($user) && $user->plan != ''){
        return true;
    }else{
        return false;
    }   
}

/**
 * Write code on Method
 *
 * @return response()
 */
function getValidateUser()
{
    $validateUser = Auth::user();

    if (Auth::user()->user_type == 2) {
        $validateUser = Auth::user()->teamLeader;
    }

    return $validateUser;
}
/**
 * Write code on Method
 *
 * @return response()
 */
 function getPlanList()
 {
    $planMember =  Plan::where('is_team','1')->get();

    return $planMember;
 }

/**
 * Write code on Method
 *
 * @return response()
 */
function teamMember()
{   
    $userPlanId = Auth::User()->plan;
    $planId = Plan::where('planId',$userPlanId)->first();
    return $planId;
}

function getMaxPlan($userCreateSubUser)
{
    return Plan::where('team_member','>',$userCreateSubUser)->first();
}

function getMinTeamMember()
{
    return Plan::min('team_member');   
}

function getMaxTeamMember()
{
    return Plan::max('team_member');   
}

function nextPlanTeamId()
{
    $userCreateSubUser = User::where('parent_id',Auth::User()->userId)->count();
    
    if(!is_null(getMaxPlan($userCreateSubUser))){
        return getMaxPlan($userCreateSubUser)->planId;
    }else{
        return getMaxPlan($userCreateSubUser);
    }
}

function getAvailablePlan()
{
    $plans = App\Plan::where('status',1)->get();

    $currentPlan = auth()->user()->planMaster;
    $user = auth()->user();

    if (is_null($currentPlan) || $currentPlan->is_team == 0 || $user->subscription('main', $user->planId)->cancelled()) {
        $plans = App\Plan::where('status',1)
                ->where(function($w){
                    return $w->where('is_team', 0)
                    ->orWhere('team_member', 5);
                });

        if (!is_null($currentPlan)) {
          $plans = $plans->where('planId', '!=', $currentPlan->planId);
        }

        $plans = $plans->get();        
    }else{
      $limitUser = $currentPlan->team_member;
      $createdUser = $userCreateSubUser = User::where('parent_id',Auth::User()->userId)->count();
      if ($limitUser == $createdUser) {
          $plans = App\Plan::where('status',1)->where('team_member', $limitUser + 5)->get();
      }else{
          $plans = App\Plan::where('status',5)->where('team_member', $limitUser)->get();
      }
    }

    return $plans;
}

function canadianCityList()
{
    $city = ["Alberta","Airdrie","Grande Prairie","Red Deer","Beaumont","Hanna","St. Albert","Bonnyville","Hinton","Spruce Grove","Brazeau","Irricana","Strathcona County","Breton","Lacombe","Strathmore","Calgary","Leduc","Sylvan Lake","Camrose","Lethbridge","Swan Hills","Canmore","McLennan","Taber","Didzbury","Medicine Hat","Turner Valley","Drayton Valley","Olds","Vermillion","Edmonton","Onoway","Wood Buffalo","Ft. Saskatchewan","Provost","British Columbia","Burnaby","Lumby","City of Port Moody","Cache Creek","Maple Ridge","Prince George","Castlegar","Merritt","Prince Rupert","Chemainus","Mission","Richmond","Chilliwack","Nanaimo","Saanich","Clearwater","Nelson","Sooke","Colwood","New Westminster","Sparwood","Coquitlam","North Cowichan","Surrey","Cranbrook","North Vancouver","Terrace","Dawson Creek","North Vancouver","Tumbler","Delta","Osoyoos","Vancouver","Fernie","Parksville","Vancouver","Invermere","Peace River","Vernon","Kamloops","Penticton","Victoria","Kaslo","Port Alberni","Whistler","Langley","Port Hardy","Manitoba","Birtle","Flin Flon","Swan River","Brandon","Snow Lake","The Pas","Cranberry Portage","Steinbach","Thompson","Dauphin","Stonewall","Winnipeg","New Brunswick","Cap-Pele","Miramichi","Saint John","Fredericton","Moncton","Saint Stephen","Grand Bay-Westfield","Oromocto","Shippagan","Grand Falls","Port Elgin","Sussex","Memramcook","Sackville","Tracadie-Sheila","Newfoundland And Labrador","Argentia","Corner Brook","Paradise","Bishop's Falls","Labrador City","Portaux Basques","Botwood","Mount Pearl","St. John's","Brigus","Northwest Territories","Town of Hay River","Town of Inuvik","Yellowknife","Nova Scotia","Amherst","Hants County","Pictou","Annapolis","Inverness County","Pictou County","Argyle","Kentville","Queens","Baddeck","County of Kings","Richmond","Bridgewater","Lunenburg","Shelburne","Cape Breton","Lunenburg County","Stellarton","Chester","Mahone Bay","Truro","Cumberland County","New Glasgow","Windsor","East Hants","New Minas","Yarmouth","Halifax","Parrsboro","Ontario","Ajax","Halton","Peterborough","Atikokan","Halton Hills","Pickering","Barrie","Hamilton","Port Bruce","Belleville","Hamilton-Wentworth","Port Burwell","Blandford-Blenheim","Hearst","Port Colborne","Blind River","Huntsville","Port Hope","Brampton","Ingersoll","Prince Edward","Brant","James","Quinte West","Brantford","Kanata","Renfrew","Brock","Kincardine","Richmond Hill","Brockville","King","Sarnia","Burlington","Kingston","Sault Ste. Marie","Caledon","Kirkland Lake","Scarborough","Cambridge","Kitchener","Scugog","Chatham-Kent","Larder Lake","Souix Lookout CoC Sioux Lookout","Chesterville","Leamington","Smiths Falls","Clarington","Lennox-Addington","South-West Oxford","Cobourg","Lincoln","St. Catharines","Cochrane","Lindsay","St. Thomas","Collingwood","London","Stoney Creek","Cornwall","Loyalist Township","Stratford","Cumberland","Markham","Sudbury","Deep River","Metro Toronto","Temagami","Dundas","Merrickville","Thorold","Durham","Milton","Thunder Bay","Dymond","Nepean","Tillsonburg","Ear Falls","Newmarket","Timmins","East Gwillimbury","Niagara","Toronto","East Zorra-Tavistock","Niagara Falls","Uxbridge","Elgin","Niagara-on-the-Lake","Vaughan","Elliot Lake","North Bay","Wainfleet","Flamborough","North Dorchester","Wasaga Beach","Fort Erie","North Dumfries","Waterloo","Fort Frances","North York","Waterloo","Gananoque","Norwich","Welland","Georgina","Oakville","Wellesley","Glanbrook","Orangeville","West Carleton","Gloucester","Orillia","West Lincoln","Goulbourn","Osgoode","Whitby","Gravenhurst","Oshawa","Wilmot","Grimsby","Ottawa","Windsor","Guelph","Ottawa-Carleton","Woolwich","Haldimand-Norfork","Owen Sound","York","Prince Edward Island","Alberton","Montague","Stratford","Charlottetown","Souris","Summerside","Cornwall","Quebec","Alma","Fleurimont","Longueuil","Amos","Gaspe","Marieville","Anjou","Gatineau","Mount Royal","Aylmer","Hull","Montreal","Beauport","Joliette","Montreal Region","Bromptonville","Jonquiere","Montreal-Est","Brosssard","Lachine","Quebec","Chateauguay","Lasalle","Saint-Leonard","Chicoutimi","Laurentides","Sherbrooke","Coaticook","LaSalle","Sorel","Coaticook","Laval","Thetford Mines","Dorval","Lennoxville","Victoriaville","Drummondville","Levis","Saskatchewan","Avonlea","Melfort","Swift Current","Colonsay","Nipawin","Tisdale","Craik","Prince Albert","Unity","Creighton","Regina","Weyburn","Eastend","Saskatoon","Wynyard","Esterhazy","Shell Lake","Yorkton","Gravelbourg","Yukon","Carcross","Whitehorse"];
    return $city;
}

function arrayCityKeyDisable($city)
{
    $disableCity = ['Alberta','British Columbia','Manitoba','New Brunswick','Newfoundland And Labrador','Northwest Territories','Nova Scotia','Ontario','Prince Edward Island','Quebec','Saskatchewan','Yukon'];
    return in_array($city,$disableCity);
}

function numberOfTransactions()
{
  return ['1' => '0-5','2' => '5-10','3' => '10-15','4' => '15-20','5' => '20-25','6' => '25-30','7' => '30 and above'];
}

function getQuestionCal($survay,$question)
{
        $createdDate = $survay->created_at;

        // get week start date and end date
        $startDate = date('Y-m-d', strtotime($createdDate->startOfWeek()));
        $endDate = date('Y-m-d', strtotime($createdDate->endOfWeek()));

        // previous Week start date and end date       
        $previousWeekDate = $createdDate->subDays($createdDate->dayOfWeek)->subWeek();
        $previousWeekStartDate = date('Y-m-d', strtotime($previousWeekDate->startOfWeek()));
        $previousWeekEndDate = date('Y-m-d', strtotime($previousWeekDate->endOfWeek()));

        $previousWeekTotal = Survey::whereBetween('created_at',[$previousWeekStartDate,$previousWeekEndDate])->where('canadian_city',$survay->canadian_city)->count();
        $previousWeekYes = Survey::whereBetween('created_at',[$previousWeekStartDate,$previousWeekEndDate])->where('canadian_city',$survay->canadian_city)->where($question,1)->count();
        $avgPreviousWeek = $previousWeekTotal * $previousWeekYes / 100;

        $currenWeekTotal = Survey::whereBetween('created_at',[$startDate,$endDate])->where('canadian_city',$survay->canadian_city)->count();
        $currenWeekYes = Survey::whereBetween('created_at',[$startDate,$endDate])->where('canadian_city',$survay->canadian_city)->where($question,1)->count();
        $avgCloseData = $currenWeekTotal * $currenWeekYes / 100;

        $avgCloseDataQuestion = $avgPreviousWeek - $avgCloseData;

        if($avgCloseDataQuestion < 0){
            $avg = abs($avgCloseDataQuestion);
            $data['color'] = 'green';
        }else{
            $avg = '-'.$avgCloseDataQuestion;
            $data['color'] = 'red';
        }
        $data['totalSurvay'] = $currenWeekYes;
        $data['avg'] = $avg;

      return $data;
}

function getTestSurveydata($city,$weekDate,$question)
{
    $data['totalRecord'] = 0;
    $data['totalRecordYes'] = 0;
    if (!empty($city) && !empty($weekDate)) {
      if($weekDate == 1){
          $monday = strtotime('next Monday -1 week');
          $sunday = strtotime(date("Y-m-d",$monday)." +6 days");
          $startDate = date("Y-m-d",$monday);
          $endDate = date("Y-m-d",$sunday);
      }elseif($weekDate == 2){
          $startDate = date("Y-m-d",strtotime('monday',strtotime('last week')));
          $endDate = date("Y-m-d",strtotime('sunday',strtotime('last week')));
      }elseif($weekDate == 3){
          $monday = strtotime('next Monday -3 week');
          $sunday = strtotime(date("Y-m-d",$monday)." +6 days");
          $startDate = date("Y-m-d",$monday);
          $endDate = date("Y-m-d",$sunday);
      }

      $data['totalRecord'] = Survey::whereBetween('created_at',[$startDate,$endDate])->where('canadian_city',$city)->count();
      $data['totalRecordYes'] = Survey::whereBetween('created_at',[$startDate,$endDate])->where('canadian_city',$city)->where($question,1)->count();
    }
    return $data;
}

function checkProductOrCredit()
{
  $cart = session()->get('cart');
  $cartType = '';
  if(session('cart')){
      foreach(session('cart') as $id => $details){
          $cartType = $details['pro_type'];
      }
  }
  return $cartType; 
}
function getCartPrices()
{
  $cart = session()->get('cart');
  $data['total'] = 0;
  $data['actualPrice'] = 0;
  if(session('cart')){
      foreach(session('cart') as $id => $details){
          $data['total'] += $details['price'] * $details['quantity'];
          $data['actualPrice'] =  $details['actual_price'] + $data['actualPrice'];
      }
  }

  $data['totalPrice'] = $data['total'] + amountGst($data['total']);
  return $data;
}