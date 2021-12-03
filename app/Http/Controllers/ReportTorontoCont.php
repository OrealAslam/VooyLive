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
use App\PointOfInterest;
use App\Recreation;
use App\TrainStation;


class ReportTorontoCont extends ReportApiCont
{
    //private $neighborhood;
    public function __construct()
    {
        $this->cityName = 'toronto';
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
        $neighborhood = new Neighborhood();
        try{
            $report=Report::findOrfail($reportId);
            $response = $neighborhood->getNeighborhood($report->city_id, $report->long, $report->lat);
            //echo '<pre>';
            //print_r($response);
            $newResponse = array();
            $checkInPolygon = array();
            $isFound = false;
            foreach ($response as $key => $val) {
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
            //print_r($checkFound);
            //var_dump($isFound);
            if ($isFound) {
                //echo 'is found';
                $counter = 1;
                $newResponse[] = '';
                foreach ($response as $key => $val) {
                    //echo $val->id;
                    if ($checkInPolygon[$val->id] == 1) {
                        $newResponse[0] = $val;
                        continue;
                    }
                    $newResponse[$counter] = $val;
                    $counter++;
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
            $response = $school->getSchoolsForToronto($report->city->name, $report->long, $report->lat, 'Elementary');
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
            $response = $school->getSchoolsForToronto($report->city->name, $report->long, $report->lat, 'Junior');
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
            $response = $school->getSchoolsForToronto($report->city->name, $report->long, $report->lat, 'Secondary');
            return $response;
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function getGoogleData($reportId,$type, $params){
        $report=Report::findOrfail($reportId);
        $response=$this->getApiCache($reportId,$type);

        if($response==NULL){
            $url="https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=[lat],[long]&type=".$type."&key=".env('GOOGLE_MAP_API').$params;
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

    public function getTransitData($reportId, $template='classic')
    {
        $data = array();
        $data['lrt_data']=$this->getTransitLrtData($reportId, $template);
        $data['bus_data']=$this->getTransitBusData($reportId, $template);
        return $data;
    }

    public function getTransitLrtData($reportId, $template='classic')
    {
        $trainStation = new TrainStation();
        try{
            $report=Report::findOrfail($reportId);
            $response = $trainStation->getTrainStations($report->city->province_id, $report->long, $report->lat);
            if ($response) {
                return $response;
            }
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }
    public function getTransitBusData($reportId, $template='classic')
    {
        $data = array();
        $report=Report::findOrfail($reportId);
        $response=$this->getApiCache($reportId,'transitBus');

        if($response==NULL){
            $train_station_data = $this->getGoogleData($reportId,'bus_station', '&rankby=distance');
            if (!empty($train_station_data->results)) {
                foreach ($train_station_data->results as $key => $value) {
                    $distance = $this->distance($report->lat, $report->long, $value->geometry->location->lat, $value->geometry->location->lng, 'K');
                    $data[] = array('distance' => $distance, 'name' => $value->name, 'vicinity' => $value->vicinity);
                    break;
                }
            }
        }

        usort($data, function($a, $b) {
            return $a['distance'] > $b['distance'];
        });

        //return ['response'=>$data];
        return $data;
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
        if(!empty($resturants->results)) {
            foreach ($resturants->results as $key => $value) {
                $distance = $this->distance($report->lat, $report->long, $value->geometry->location->lat, $value->geometry->location->lng, 'K');
                $data['resturants'][] = array('distance' => $distance, 'name' => $value->name, 'vicinity' => $value->vicinity);
            }
        }
        $banks=$this->getBankData($reportId);
        if(!empty($banks->results)){
            foreach ($banks->results as $key => $value) {
                $distance = $this->distance($report->lat, $report->long, $value->geometry->location->lat, $value->geometry->location->lng, 'K');
                $data['banks'][] = array('distance' => $distance, 'name' => $value->name, 'vicinity' => $value->vicinity);
            }
        }
        $conStores=$this->getConStoreData($reportId);
        if(!empty($conStores->results)){
            foreach ($conStores->results as $key => $value) {
                $distance = $this->distance($report->lat, $report->long, $value->geometry->location->lat, $value->geometry->location->lng, 'K');
                $data['conStores'][] = array('distance' => $distance, 'name' => $value->name, 'vicinity' => $value->vicinity);
            }
        }
        $gasstations=$this->getGasstationData($reportId);
        if(!empty($gasstations->results)){
            foreach ($gasstations->results as $key => $value) {
                $distance = $this->distance($report->lat, $report->long, $value->geometry->location->lat, $value->geometry->location->lng, 'K');
                $data['gasstations'][] = array('distance' => $distance, 'name' => $value->name, 'vicinity' => $value->vicinity);
            }
        }
        $cafe=$this->getCafeData($reportId);
        if(!empty($cafe->results)){
            foreach ($cafe->results as $key => $value) {
                $distance = $this->distance($report->lat, $report->long, $value->geometry->location->lat, $value->geometry->location->lng, 'K');
                $data['cafe'][] = array('distance' => $distance, 'name' => $value->name, 'vicinity' => $value->vicinity);
            }
        }
        /*
        $wificenters=$this->getWifiCenterData($reportId);
        foreach ($wificenters->results as $key => $value) {
            $distance = $this->distance($report->lat, $report->long, $value->geometry->location->lat, $value->geometry->location->lng, 'K');
            $data['wificenters'][] = array('distance' => $distance, 'name' => $value->name, 'vicinity' => $value->vicinity);
        }
        */

        $attractionData=$this->getAttractionData($reportId);
        if ($attractionData && isset($attractionData['attraction']) && is_array($attractionData['attraction']) && count($attractionData['attraction']) > 0) {
            foreach ($attractionData['attraction'] as $key => $value) {
                //$distance = $this->distance($report->lat, $report->long, $value->geometry->location->lat, $value->geometry->location->lng, 'K');
                $data['attractionData'][] = array('distance' => $distance, 'name' => $value->title, 'address' => $value->address);
            }
        }


        /*
        foreach ($wificenters['response'] as $key => $value) {
            $distance = $this->distance($report->lat, $report->long, $value->latitude, $value->longitude, 'K');
            $data['wificenters'][] = array('distance' => $distance, 'address' => $value->address, 'facility_type' => $value->facility_type, 'location_name' => $value->location_name, 'status' => $value->status, 'wifiprovider' => $value->wifiprovider);
        }
        */
        /*
        $attraction=$this->getAttractionData($reportId);
        foreach ($attraction['response'] as $key => $value) {
            $distance = $this->distance($report->lat, $report->long, $value->latitude, $value->longitude, 'K');
            $data['attraction'][] = array('distance' => $distance, 'name' => $value->name, 'vicinity' => $value->address);
        }
        */

        return ['response'=>$data];
    }

    public function getResturantData($reportId){
        return $this->getGoogleData($reportId,'restaurant', '&radius=2000');
    }
    public function getStoreData($reportId){
        return $this->getGoogleData($reportId,'department_store', '&radius=2000');
    }
    public function getConStoreData($reportId){
         return $this->getGoogleData($reportId,'convenience_store', '&radius=2000');
    }    
    public function getCafeData($reportId){
         return $this->getGoogleData($reportId,'cafe', '&radius=2000');
    }    
    public function getBankData($reportId){
         return $this->getGoogleData($reportId,'bank', '&radius=2000');
    }    
    public function getGasstationData($reportId){
         return $this->getGoogleData($reportId,'gas_station', '&radius=2000');
    }
    public function getDryCleanerData($reportId){
         return $this->getGoogleData($reportId,'dry_cleaner', '&radius=2000');
    }
    public function getWifiCenterData($reportId){
         return $this->getGoogleData($reportId,'wifi_center', '&radius=2000');
    }
    public function getAttractionData($reportId){
        $neighborhood = new Neighborhood();
        $pointOfInterest = new PointOfInterest();
        try{
            $report=Report::findOrfail($reportId);
            $type = 'Attraction';
            $response = $pointOfInterest->getPointOfInterestData($report->city_id, $report->long, $report->lat, $type);
            return array('attraction' => $response);
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
            $response = $park->getParksByCityId($report->city_id, $report->long, $report->lat);
            return array('park' => $response);
        }
        catch(Exception $e){
            return $e->getMessage();
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

                //$data['medianAge']=$response->median_age;
                $data['averageIncome']=$response->avg_total_income;
                $data['household']=$response->avg_house_hold;
                $data['rentalVsOwned']=$this->getRentalVsOwned($response);
                $age=$this->getAgeChart($response, $template);
                $data['ageChart']=$age->render();
                $edu=$this->getEduChart($response, $template);
                $data['eduChart']=$edu->render();
            }
            return $data;
        }
        catch(Exception $e){
            //echo 'masood';die();
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

    public function getRecreationData($reportId, $template='classic'){
        $recreation = new Recreation();
        try{
            $report=Report::findOrfail($reportId);
            $response = $recreation->getRecreations($report->city_id, $report->long, $report->lat);
            return array('recreation' => $response);
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

}
