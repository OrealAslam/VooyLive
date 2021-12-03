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
use App\Neighborhood;
use App\School;
use App\Park;
use App\CulturalSpace;
use App\Library;
use App\Demographic;
use App\CommunityCentre;


class ReportVancouverCont extends ReportApiCont
{
    public $cityName = 'vancouver';

    //private $neighborhood;
    public function __construct()
    {
        //$this->neighborhood = new Neighborhood();
    }
    /*
    public function getNeighborsData($reportId, $template='classic')
    {
        $neighborhood = new Neighborhood();
        try{
            $report=Report::findOrfail($reportId);
            $response = $neighborhood->getNeighborhood($report->city_id, $report->long, $report->lat);
            return ['response'=>$response, 'report' => $report];
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }
    */

    public function getNeighborsData($reportId, $template='classic')
    {
        $neglactNeighborhood = ['Stanley Park'];
        $neighborhood = new Neighborhood();
        try{
            $report=Report::findOrfail($reportId);
            $response = $neighborhood->getNeighborhood($report->city_id, $report->long, $report->lat);
            //echo '<pre>';
            //print_r($response);
            //die();
            $newResponse = array();
            $checkInPolygon = array();
            $isFound = false;
            foreach ($response as $key => $val) {
                if (!in_array($val->name, $neglactNeighborhood)) {
                    $boundary = json_decode($val->boundary);

                    $vertices_x = $boundary->long;// x-coordinates of the vertices of the polygon
                    $vertices_y = $boundary->lat; // y-coordinates of the vertices of the polygon
                    $points_polygon = count($vertices_x);  // number vertices - zero-based array
                    $longitude_x = $report->long;  // x-coordinate of the point to test
                    $latitude_y = $report->lat;    // y-coordinate of the point to test

                    if ($this->is_in_polygon($points_polygon, $vertices_x, $vertices_y, $longitude_x, $latitude_y)) {
                        $checkInPolygon[$val->id] = 1;
                        $isFound = true;
                    } else {
                        $checkInPolygon[$val->id] = 0;
                    }
                }
            }
            //print_r($checkInPolygon);
            //die();
            //var_dump($isFound);
            if ($isFound) {
                //echo 'is found';
                $counter = 1;
                $newResponse[] = '';
                foreach ($response as $key => $val) {
                    if (!in_array($val->name, $neglactNeighborhood)) {
                        //echo $val->id;
                        if ($checkInPolygon[$val->id] == 1) {
                            $newResponse[0] = $val;
                            continue;
                        }
                        $newResponse[$counter] = $val;
                        $counter++;
                    }
                }
            } else {
                $newResponse = $response;
            }
            //print_r($newResponse);
            //die();


            return ['response'=>$newResponse, 'report' => $report];
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function getSchoolData($reportId, $template='classic'){
        $data['elementerySchool']=$this->getElementerySchool($reportId, $template);
        $data['juniorSchool']=$this->getJuniorSchool($reportId, $template);
        $data['highSchool']=$this->getHighSchool($reportId, $template);
        return $data;
    }


    public function getElementerySchool($reportId, $template='classic')
    {
        $school = new School();
        try{
            $report=Report::findOrfail($reportId);
            $response = $school->getSchoolsForVancouver($report->city->name, $report->long, $report->lat, 'ELEMENTARY');
            return $response;
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function getJuniorSchool($reportId, $template='classic')
    {
        $school = new School();
        try{
            $report=Report::findOrfail($reportId);
            $response = $school->getSchoolsForVancouver($report->city->name, $report->long, $report->lat, 'JUNIOR');
            //$response = $school->getSchools($report->city->name, $report->long, $report->lat, 'SECONDARY');
            return $response;
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function getHighSchool($reportId, $template='classic')
    {
        $school = new School();
        try{
            $report=Report::findOrfail($reportId);
            $response = $school->getSchoolsForVancouverTwoEduLevel($report->city->name, $report->long, $report->lat, 'SECONDARY', 'SENIOR SECONDARY');
            return $response;
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }


    public function getParkData($reportId, $template='classic'){
        $neighborhood = new Neighborhood();
        $park = new Park();
        try{
            $report=Report::findOrfail($reportId);
            $neighborhoodRec = $neighborhood->getNeighborhood($report->city_id, $report->long, $report->lat);
            if ($neighborhoodRec && $neighborhoodRec[0]) {
                $response = $park->getParks($report->city_id, $neighborhoodRec[0]->id , $report->long, $report->lat);
                return array('park' => $response);
            }
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function getLibraryData($reportId, $template='classic'){
        $library = new Library();
        try{
            $report=Report::findOrfail($reportId);
            $response = $library->getLibraries($report->city->name, $report->long, $report->lat);
            return array('library' => $response);
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function getMapData($reportId, $template='classic'){
        $report=Report::findOrfail($reportId);
        $data = array();
        $resturants=$this->getResturantData($reportId);
        foreach ($resturants->results as $key => $value) {
            $distance = $this->distance($report->lat, $report->long, $value->geometry->location->lat, $value->geometry->location->lng, 'K');
            $data['resturants'][] = array('distance' => $distance, 'name' => $value->name, 'vicinity' => $value->vicinity);
        }
        $banks=$this->getBankData($reportId);
        foreach ($banks->results as $key => $value) {
            $distance = $this->distance($report->lat, $report->long, $value->geometry->location->lat, $value->geometry->location->lng, 'K');
            $data['banks'][] = array('distance' => $distance, 'name' => $value->name, 'vicinity' => $value->vicinity);
        }
        $conStores=$this->getConStoreData($reportId);
        foreach ($conStores->results as $key => $value) {
            $distance = $this->distance($report->lat, $report->long, $value->geometry->location->lat, $value->geometry->location->lng, 'K');
            $data['conStores'][] = array('distance' => $distance, 'name' => $value->name, 'vicinity' => $value->vicinity);
        }
        $gasstations=$this->getGasstationData($reportId);
        foreach ($gasstations->results as $key => $value) {
            $distance = $this->distance($report->lat, $report->long, $value->geometry->location->lat, $value->geometry->location->lng, 'K');
            $data['gasstations'][] = array('distance' => $distance, 'name' => $value->name, 'vicinity' => $value->vicinity);
        }
        $cafe=$this->getCafeData($reportId);
        foreach ($cafe->results as $key => $value) {
            $distance = $this->distance($report->lat, $report->long, $value->geometry->location->lat, $value->geometry->location->lng, 'K');
            $data['cafe'][] = array('distance' => $distance, 'name' => $value->name, 'vicinity' => $value->vicinity);
        }
        $wificenters=$this->getWifiCenterData($reportId);
        
        $data['wificenters'][] = [''];
        if(isset($wificenters->results)){
            foreach ($wificenters->results as $key => $value) {
                $distance = $this->distance($report->lat, $report->long, $value->geometry->location->lat, $value->geometry->location->lng, 'K');
                $data['wificenters'][] = array('distance' => $distance, 'name' => $value->name, 'vicinity' => $value->vicinity);
            }
        }

        $cultureData=$this->getCultureData($reportId);
        foreach ($cultureData['culture'] as $key => $value) {
            //$distance = $this->distance($report->lat, $report->long, $value->geometry->location->lat, $value->geometry->location->lng, 'K');
            $data['cultureData'][] = array('distance' => $distance, 'name' => $value->cultural_space_name, 'address' => $value->address);
        }

        /*
        foreach ($wificenters['response'] as $key => $value) {
            $distance = $this->distance($report->lat, $report->long, $value->latitude, $value->longitude, 'K');
            $data['wificenters'][] = array('distance' => $distance, 'address' => $value->address, 'facility_type' => $value->facility_type, 'location_name' => $value->location_name, 'status' => $value->status, 'wifiprovider' => $value->wifiprovider);
        }
        */
        /*
        $attraction=$this->getAttractiondata($reportId);
        foreach ($attraction['response'] as $key => $value) {
            $distance = $this->distance($report->lat, $report->long, $value->latitude, $value->longitude, 'K');
            $data['attraction'][] = array('distance' => $distance, 'name' => $value->name, 'vicinity' => $value->address);
        }
        */

        return ['response'=>$data];
    }

    public function getResturantData($reportId){
        return $this->getGoogleData($reportId,'restaurant');
    }
    public function getStoreData($reportId){
        return $this->getGoogleData($reportId,'department_store');
    }
    public function getConStoreData($reportId){
         return $this->getGoogleData($reportId,'convenience_store');
    }    
    public function getCafeData($reportId){
         return $this->getGoogleData($reportId,'cafe');
    }    
    public function getBankData($reportId){
         return $this->getGoogleData($reportId,'bank');
    }    
    public function getGasstationData($reportId){
         return $this->getGoogleData($reportId,'gas_station');
    }
    public function getDryCleanerData($reportId){
         return $this->getGoogleData($reportId,'dry_cleaner');
    }
    public function getWifiCenterData($reportId){
         return $this->getGoogleData($reportId,'wifi_center');
    }

    public function getCultureData($reportId, $template='classic'){
        $neighborhood = new Neighborhood();
        $culturalSpace = new CulturalSpace();
        try{
            $report=Report::findOrfail($reportId);
            $neighborhoodRec = $neighborhood->getNeighborhood($report->city_id, $report->long, $report->lat);
            if ($neighborhoodRec && $neighborhoodRec[0]) {
                $response = $culturalSpace->getCulturalSpaces($report->city_id, $neighborhoodRec[0]->id , $report->long, $report->lat);
                return array('culture' => $response);
            }
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function getGoogleData($reportId,$type){
        $report=Report::findOrfail($reportId);
        $response=$this->getApiCache($reportId,$type);

        if($response==NULL){
            $url="https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=[lat],[long]&radius=2000&type=".$type."&key=".env('GOOGLE_MAP_API');
            $url=str_replace('[lat]',$report->lat,$url);
            $url=str_replace('[long]',$report->long,$url);
            $response=$this->getApiData($reportId,$url,$type);
        }
        if(json_decode($response)) {
            $response=json_decode($response);
            return $response;
        } else {
            return array();
        }
    }

    public function getDemographyData($reportId, $template='classic'){
        $neighborhood = new Neighborhood();
        $demographic = new Demographic();
        $data = array();
        try{
            $report=Report::findOrfail($reportId);
            $neighborhoodRec = $neighborhood->getNeighborhood($report->city_id, $report->long, $report->lat);
            if ($neighborhoodRec && $neighborhoodRec[0]) {
                $response = $demographic->getDemographicData($report->city_id, $neighborhoodRec[0]->id);

                $data['medianAge']=$response->median_age;
                $data['averageIncome']=$response->avg_total_income;
                //$data['household']=$this->getHousehold($reportId);
                $data['rentalVsOwned']=$this->getRentalVsOwned($response);
                $age=$this->getAgeChart($response, $template);
                $data['ageChart']=$age->render();
                $edu=$this->getEduChart($response, $template);
                $data['eduChart']=$edu->render();

                return $data;
            }
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function getRentalVsOwned($data, $template='classic') {
        try{
            $noOfHouseOwned = $data->owner;
            $noOfHouseRented = $data->renter;
            $totalHouse = $noOfHouseOwned + $noOfHouseRented;
            $percentHouseOwned = 0;
            $percentHouseRented = 0;
            if ($totalHouse !== 0) {
                $percentHouseOwned = round(($noOfHouseOwned / $totalHouse ) * 100, 2);
                $percentHouseRented = round(($noOfHouseRented / $totalHouse ) * 100, 2);
            }

            return [
                'noOfHouseOwned' => $noOfHouseOwned,
                'noOfHouseRented' => $noOfHouseRented,
                'totalHouse' => $totalHouse,
                'percentHouseOwned' => $percentHouseOwned,
                'percentHouseRented' => $percentHouseRented,
                ];
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }
    public function getAgeChart($data, $template='classic'){
        $newData = ['response' => $data];
        return view('reports.'.$this->cityName.'.'.$template.'.demobyage',$newData);
    }    
    public function getEduChart($data, $template='classic'){
        $newData = ['response' => $data];
        return view('reports.'.$this->cityName.'.'.$template.'.demobyedu',$newData);
    }    

    public function getTransitData($reportId)
    {
        $data['lrt_data']=$this->getTransitLrtData($reportId);
        $data['bus_data']=$this->getTransitBusData($reportId);
        return $data;
    }
    public function getTransitLrtData($reportId, $template='classic')
    {
        $data = array();
        $report=Report::findOrfail($reportId);
        $response=$this->getApiCache($reportId,'transitLrt');

        if($response==NULL){
            $train_station_data = $this->getGoogleData($reportId,'train_station');
            foreach ($train_station_data->results as $key => $value) {
                $distance = $this->distance($report->lat, $report->long, $value->geometry->location->lat, $value->geometry->location->lng, 'K');
                $data[] = array('distance' => $distance, 'name' => $value->name, 'vicinity' => $value->vicinity);
                break;
            }
        }

        usort($data, function($a, $b) {
            return $a['distance'] > $b['distance'];
        });

        //return ['response'=>$data];
        return $data;
    }
    public function getTransitBusData($reportId, $template='classic')
    {
        //http://api.translink.ca/rttiapi/v1/stops?apikey=asn5LRGSjMsCVr1dB6W9&lat=49.187706&long=-122.850060&Radius
        $report=Report::findOrfail($reportId);
        $response=$this->getApiCache($reportId,'transitBus');

        if($response==NULL){
            $url='http://api.translink.ca/rttiapi/v1/stops?apikey='.config('app.translink_ai_key').'&lat=[lat]&long=[long]&Radius=[radius]';
            $url=str_replace('[lat]',number_format($report->lat,6),$url);
            $url=str_replace('[long]',number_format($report->long,6),$url);
            $url=str_replace('[radius]',2000,$url);
            $headers = array();
            $headers['content-type'] = 'application/JSON';
            $headers['accept'] = 'application/JSON';
            $response=$this->getApiData($reportId,$url,'transitBus', $headers);
        }

        $data = array();
        if(count(json_decode($response)) > 0) {
            $response = json_decode($response);
            usort($response, function($a, $b) {
                return $a->Distance > $b->Distance;
            });
            foreach ($response as $value) {
               //$value->Distance = $value->Distance * (0.001);
               $data[] = array('distance' => ($value->Distance * (0.001)), 'name' => $value->Name);
               break;
            }
        }
        return $data;
    }

    public function getCommunitycenterdata($reportId, $template='classic'){
        $communityCentre = new CommunityCentre();
        try{
            $report=Report::findOrfail($reportId);
            $response = $communityCentre->getCommunityCentres($report->city_id, $report->long, $report->lat);
            return array('response' => $response);
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }


}
