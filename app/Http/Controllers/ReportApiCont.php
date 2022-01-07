<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Report;
use App\dataApi;
use App\Order;
use App\User;
use Illuminate\Support\Facades\Storage;
use PDF;
use Auth;
use Session;
use App\Http\Controllers\ReportEdmontonCont;
use App\Http\Controllers\ReportCalgaryCont;
use App\ReportNotes;
class ReportApiCont extends Controller
{
    protected $reportGetCont;
    public $cityName;

    public function __construct()
    {
        //$this->reportGetCont = new ReportEdmontonCont;
    }


    public function viewReport(Request $request, $reportId, $userId, $template = false)
    {
        $templateList = array('classic', 'metro');

        $editReportAddress = false;
        if ($request->has('edit')) {
            $editReportAddress = true;
        }


        if (!$template) {
            $template = 'classic';
            $noTemplateSelected = 0;
        } else {
            $noTemplateSelected = 1;
            if (!in_array($template, $templateList)) {
                $template = 'classic';
            }
        }

        if (Auth::check()) {
            $user=Auth::User();
            $user = User::where('userId', $user->userId)->first();
            if ($user->role != 'admin') {
                if (in_array($userId, getClientList($userId))) {
                    $order=Order::where([['userId',$userId],['reportId',$reportId]])->count();
                    if($order == 0) {
                        Session::flash('error_msg', 'Access Denied');
                        return redirect(route('orders'));
                    }
                } else {
                    Session::flash('error_msg', 'Access Denied');
                    return redirect(route('orders'));
                }
            } else {
                $user = User::where('userId', $userId)->first();
                $order=Order::where([['userId',$userId],['reportId',$reportId]])->count();
                if($order == 0) {
                    return redirect(route('home'));
                }
            }
        } else {
            $user = User::where('userId', $userId)->first();
            $order=Order::where([['userId',$userId],['reportId',$reportId]])->count();
            if($order == 0) {
                return redirect(url('/'));
            }
        }

        $report = Report::findOrfail($reportId);

        $data['user'] = $user;
        $data['report']=$report;
        $data['orderData'] = Order::where([['userId',$userId],['reportId',$reportId]])->first();
        $data['template']=$template;
        // $reportGetContName = class_exists('App\Http\Controllers\Report'.$report->City->name.'Cont')?'App\Http\Controllers\Report'.$report->City->name.'Cont':'App\Http\Controllers\ReportOtherCont';
        $reportGetContName = 'App\Http\Controllers\ReportOtherCont';
        $this->reportGetCont = new $reportGetContName();
        $data['neighborsData']=$this->reportGetCont->getNeighborsData($reportId, $template);
        $allReports = array(
            array('name' => 'neighbors',    'funcName' => 'neighbors',      'cities' => array(1,2,3,4)),
            array('name' => 'demography',   'funcName' => 'demography',     'cities' => array(1,2,3,4)),
            array('name' => 'school',       'funcName' => 'school',         'cities' => array(1,2,3,4)),
            array('name' => 'transit',      'funcName' => 'transit',        'cities' => array(1,2,3,4)),
            array('name' => 'library',      'funcName' => 'library',        'cities' => array(1,2,3,4)),
            array('name' => 'map',          'funcName' => 'map',            'cities' => array(1,2,3,4)),

            array('name' => 'playground',   'funcName' => 'playground',     'cities' => array(1)),
            array('name' => 'recreation',   'funcName' => 'recreation',     'cities' => array(1,2,4)),

            array('name' => 'safety',        'funcName' => 'safety',        'cities' => array(2)),
            array('name' => 'waste',         'funcName' => 'waste',         'cities' => array(2)),

            array('name' => 'communitycenter','funcName' => 'communitycenter','cities' => array(2,3)),

            array('name' => 'park',           'funcName' => 'park',          'cities' => array(3,4)),
        );
        
        foreach ($allReports as $val) {

         
            $data[$val['name']]=$this->reportGetCont->getCachedData($reportId,$val['funcName'], $template);
            
        }
        $data['page'] = 'viewReport';
        $data['noTemplateSelected'] = $noTemplateSelected;
        $data['urlParams'] = array('reportId'=>$reportId, 'userId'=>$userId, 'template'=>$template);
        $reportNotesCount = ReportNotes::where([['userId',$userId],['reportId',$reportId]])->count();
        if ($reportNotesCount == 0) {
            $data['reportNotes'] = array (
                1 => 'A cozy, friendly neighbourhood with a strong family presence, {Sweet Grass} charming homes and unique shops fill its streets with a sense of welcomed familiarity.',
                2 => 'Just minutes from the {park} and {ravines} , get ready to enjoy walking and biking trips through abundant park space that is perfect for spontaneous picnics and outdoor fun in all seasons.',
                3 => 'Convenient access to the {Anthony Henday} Expressway helps residents to enjoy a quick 15-minute trip to the downtown core, making this community ideal for commuters.'
            );
        } else {
            $reportNotesRec = ReportNotes::where([['userId',$userId],['reportId',$reportId]])->first();
            $data['reportNotes'] = array (
                                    1 => $reportNotesRec->point_1,
                                    2 => $reportNotesRec->point_2,
                                    3 => $reportNotesRec->point_3,
                                );
        }
        /*
        $data['downloadLink'] = route('reportDetails', ['reportId' => $reportId, 'userId' => $userId]).'?download=pdf';

        if($request->has('download')){
            // Set extra option
            //PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            // pass view file
            $pdf = PDF::loadView('reports.'.strtolower($report->City->name).'.'.$template.'.highlights',$data);
            // download pdf
            return $pdf->download('pdfview.pdf');
            die();
        }
        */
        if ($editReportAddress) {
            $data['edit_report_address'] = $editReportAddress;
            $data['hide_top_address_search'] = true;
        }
        return view('reports.other.'.$template.'.highlights',$data);

        // if($reportGetContName=='App\Http\Controllers\ReportOtherCont')
        // return view('reports.other.'.$template.'.highlights',$data);
        // else
        // return view('reports.'.strtolower($report->City->name).'.'.$template.'.highlights',$data);
    }

    public function getCachedData($reportId,$name, $template)
    {

        $reportNames = [
            'neighbors', 
            'demography',
            'school',
            'transit',
            'library',
            'map',
            'playground',
            'recreation',
            'safety',
            'waste',
            'communitycenter',
            'park',
        ];

        if(in_array($name, $reportNames)){
            return $this->getView($name, $reportId, $template);
        }

        try{
            $response=Storage::exists('reports/'.$reportId.'/'.$name.'.json');
            if($response==true){
               return $this->getview($name, $reportId, $template);

            }else
            return NULL;
        }
        catch(Exception $e){
            return NULL;
        }
    }

    public function getView($api,$reportId, $template)
    {

        $report = Report::findOrfail($reportId);
        // $reportGetContName = class_exists('App\Http\Controllers\Report'.$report->City->name.'Cont')?'App\Http\Controllers\Report'.$report->City->name.'Cont':'App\Http\Controllers\ReportOtherCont';
        $reportGetContName = 'App\Http\Controllers\ReportOtherCont';
        $this->reportGetCont = new $reportGetContName();


        try{
            $function='get'.ucwords($api).'Data';
            if(!method_exists($this->reportGetCont,$function))
            return '';
            $response=$this->reportGetCont->$function($reportId, $template);
            return view('reports.other.'.$template.'.'.$api,$response);

            // if($reportGetContName=='App\Http\Controllers\ReportOtherCont')
            // return view('reports.other.'.$template.'.'.$api,$response);
            // else
            // return view('reports.'.strtolower($report->City->name).'.'.$template.'.'.$api,$response);

        }
         catch(Exception $e){
            return $e->getMessage();
        }
    }


    public function getApiCache($reportId,$name)
    {
        try{
            $response=Storage::exists('reports/'.$reportId.'/'.$name.'.json');
            if($response==true){
                $response=Storage::get('reports/'.$reportId.'/'.$name.'.json');
                return $response;
            }else
            return NULL;
        }
        catch(Exception $e){
            return NULL;
        }
    }
    public function getApiData($reportId,$url,$name, $headers=false){
        $client = new Client();

        $options = array();
        $options['verify'] = false;
        if ($headers && is_array($headers)) {
            $options['headers'] = $headers;
        }
        $res = $client->request('GET', $url, $options);
        if($res->getStatusCode()==200){
            $response=(string)$res->getBody();
            Storage::put('reports/'.$reportId.'/'.$name.'.json', $response);
            return $response;
        }
        else
            return NULL;
    }

    public function distance($lat1, $lon1, $lat2, $lon2, $unit) {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
            return ($miles * 1.609344);
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    }

   

    public function is_in_polygon($points_polygon, $vertices_x, $vertices_y, $longitude_x, $latitude_y)
    {
        $i = $j = $c = 0;
        for ($i = 0, $j = $points_polygon-1 ; $i < $points_polygon; $j = $i++) {
            if ( (($vertices_y[$i] > $latitude_y != ($vertices_y[$j] > $latitude_y)) &&
                ($longitude_x < ($vertices_x[$j] - $vertices_x[$i]) * ($latitude_y - $vertices_y[$i]) / ($vertices_y[$j] - $vertices_y[$i]) + $vertices_x[$i]) ) )
                $c = !$c;
        }
        return $c;
    }


}
