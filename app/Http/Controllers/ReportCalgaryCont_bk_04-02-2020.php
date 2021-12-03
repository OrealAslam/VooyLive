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
use Illuminate\Support\Facades\DB;
use App\Neighborhood;




class ReportCalgaryCont extends ReportApiCont
{
    public $cityName = 'calgary';

    //https://data.calgary.ca/Base-Maps/Community-Points/j9ps-fyst
    public function getCommunity($reportId, $template='classic'){
        $report=Report::findOrfail($reportId);
        $response=$this->getApiCache($reportId,'neighbors');
        if($response==NULL){
            $url='https://data.calgary.ca/resource/kzbm-mn66.json?$limit=5&$where=within_circle(location, [lat], [long], [radius])';
                $url=str_replace('[radius]',config('app.radius'),$url);
                $url=str_replace('[lat]',$report->lat,$url);
                $url=str_replace('[long]',$report->long,$url);
                $url.='&$order=distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\')';
            $response=$this->getApiData($reportId,$url,'neighbors');
        }
        $response=json_decode($response);
        return $response[0]->name;
    }
/*
    public function getNeighborsData($reportId, $template='classic'){
        try{
            $report=Report::findOrfail($reportId);
            $response=$this->getApiCache($reportId,'neighbors');
            if($response==NULL){
                $url='https://data.calgary.ca/resource/kzbm-mn66.json?$limit=5&$where=within_circle(location, [lat], [long], [radius])';
                $url=str_replace('[radius]',config('app.radius'),$url);
                $url=str_replace('[lat]',$report->lat,$url);
                $url=str_replace('[long]',$report->long,$url);
                $url.='&$order=distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\')';
                $response=$this->getApiData($reportId,$url,'neighbors');
            }
            return ['response'=>json_decode($response), 'report' => $report];

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

    public function getDemographyData($reportId, $template='classic'){
        $data['population']=$this->getPopulation($reportId, $template);
        $data['household']=$this->getHousehold($reportId, $template);
        $data['householdsize']=$this->getHouseHoldSize($reportId, $template);

        /*
        $data['averageIncome']=$this->getAverageIncome($reportId);
        //$data['household']=$this->getHousehold($reportId);
        $data['rentalVsOwned']=$this->getRentalVsOwned($reportId);
        $data['medianAge']=$this->getMedianAge($reportId);
        $age=$this->getAgeChart($reportId);
        $edu=$this->getEduChart($reportId);
        $data['ageChart']=$age->render();
        $data['eduChart']=$edu->render();
        */
        return $data;
    }
    public function getPopulation($reportId, $template='classic'){
        $report=Report::findOrfail($reportId);
        $response=NULL;
        $neighborhood=$this->getCommunity($reportId);
        if($neighborhood){
            $response=$this->getApiCache($reportId,'demographyhousehold');
            if($response==NULL){
                $url='https://data.calgary.ca/resource/eme4-y5m7.json?name='.strtoupper($neighborhood).'&$limit=1&$order=census_year DESC';
                $response=$this->getApiData($reportId,$url,'demographyhousehold');
            }
        }
        return json_decode($response);
    }
    public function getHousehold($reportId, $template='classic'){
        $report=Report::findOrfail($reportId);
        $response=NULL;
        $response=$this->getPopulation($reportId);
        return $response;
    }
    public function getHouseHoldSize($reportId, $template='classic'){
        $report=Report::findOrfail($reportId);
        $response=NULL;
        $response=$this->getPopulation($reportId);
        return $response;
    }


    public function getSafetyData($reportId, $template='classic'){
        $data['police_station']=$this->getPoliceStation($reportId, $template);
        $data['fire_station']=$this->getFireStation($reportId, $template);
        return $data;
    }
    public function getPoliceStation($reportId, $template='classic'){
        $report=Report::findOrfail($reportId);
        $response=$this->getApiCache($reportId,'police_station');

        if($response==NULL){
            $url='https://data.calgary.ca/resource/my86-b8vn.json?$limit=1&$where=within_circle(location, [lat], [long], [radius])';
            $url=str_replace('[lat]',$report->lat,$url);
            $url=str_replace('[long]',$report->long,$url);
            $url=str_replace('[radius]',config('app.radius'),$url);
            $url.='&$order=distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\')&$select=*, distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\') AS range';
      
            $response=$this->getApiData($reportId,$url,'police_station');
        }
        $data = array();
        if(count(json_decode($response)) > 0) {
            foreach (json_decode($response) as $value) {
                $value->distance = $this->distance($report->lat, $report->long, $value->latitude, $value->longitude, 'K');
                $data[] = $value;
            }
            return $data;
        } else {
            return array();
        }
    }
    public function getFireStation($reportId, $template='classic')
    {
        //https://dev.socrata.com/foundry/data.calgary.ca/cqsb-2hhg
        $report=Report::findOrfail($reportId);
        $response=$this->getApiCache($reportId,'fire_station');

        if($response==NULL){
            // $url='https://data.calgary.ca/resource/fsqf-xw5a.json?$limit=1&$where=within_circle(location, [lat], [long], [radius])';
            $url='https://data.calgary.ca/resource/cqsb-2hhg.json?$limit=1&$where=within_circle(point, [lat], [long], [radius])';
            $url=str_replace('[lat]',$report->lat,$url);
            $url=str_replace('[long]',$report->long,$url);
            $url=str_replace('[radius]',config('app.radius'),$url);
            // $url.='&$order=distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\')&$select=*, distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\') AS range';
            $url.='&$order=distance_in_meters(point, \'POINT ('.$report->long.' '.$report->lat.')\')&$select=*, distance_in_meters(point, \'POINT ('.$report->long.' '.$report->lat.')\') AS range';
      
            $response=$this->getApiData($reportId,$url,'fire_station');
        }
        $data = array();
        if($response && count(json_decode($response)) > 0) {
            foreach (json_decode($response) as $value) {
                if (
                    isset($value->point) && 
                    isset($value->point->type) &&
                    $value->point->type == 'Point' &&
                    isset($value->point->coordinates)
                ) {
                    $value->distance = $this->distance($report->lat, $report->long, $value->point->coordinates[1], $value->point->coordinates[0], 'K');
                } else {
                    $value->distance = $this->distance($report->lat, $report->long, $value->latitude, $value->longitude, 'K');
                }
                $data[] = $value;
            }
            return $data;
        } else {
            return array();
        }
    }


    public function getWasteData($reportId, $template='classic'){
        $wkly_freq_2017 = [1=>'Every Week', 2=>'Every Second Week'];

        $data['waste_blue_cart']=$this->getWasteBlueCart($reportId, $template);
        $data['waste_black_cart']=$this->getWasteBlackCart($reportId, $template);
        $data['waste_green_cart']=$this->getWasteGreenCart($reportId, $template);

        foreach ($data as $key => $val) {
            if (isset($val[0]) && isset($val[0]->wkly_freq_2017)) {
                $val[0]->wkly_freq_2017 = $wkly_freq_2017[$val[0]->wkly_freq_2017];
            }
        }

        return $data;
    }
    public function getWasteBlueCart($reportId, $template='classic'){
        $report=Report::findOrfail($reportId);
        $response=$this->getApiCache($reportId,'waste_blue_cart');

        if($response==NULL){
            $url='https://data.calgary.ca/resource/g5k5-gjns.json?$limit=1&$where=within_circle(location, [lat], [long], [radius])';
            // $url.='&clect_type=Blue';
            $url.='&commodity=Blue';
            $url=str_replace('[lat]',$report->lat,$url);
            $url=str_replace('[long]',$report->long,$url);
            $url=str_replace('[radius]',config('app.radius'),$url);
            $url.='&$order=distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\')&$select=*, distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\') AS range';
      
            $response=$this->getApiData($reportId,$url,'waste_blue_cart');
        }
        $data = array();
        if($response && count(json_decode($response)) > 0) {
            foreach (json_decode($response) as $value) {
                $value->distance = $this->distance($report->lat, $report->long, $value->latitude, $value->longitude, 'K');
                $data[] = $value;
            }
            return $data;
        } else {
            return array();
        }
    }
    public function getWasteBlackCart($reportId, $template='classic'){
        $report=Report::findOrfail($reportId);
        $response=$this->getApiCache($reportId,'waste_black_cart');

        if($response==NULL){
            $url='https://data.calgary.ca/resource/g5k5-gjns.json?$limit=1&$where=within_circle(location, [lat], [long], [radius])';
            // $url.='&clect_type=Blue';
            $url.='&commodity=Black';
            $url=str_replace('[lat]',$report->lat,$url);
            $url=str_replace('[long]',$report->long,$url);
            $url=str_replace('[radius]',config('app.radius'),$url);
            $url.='&$order=distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\')&$select=*, distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\') AS range';
      
            $response=$this->getApiData($reportId,$url,'waste_black_cart');
        }
        $data = array();
        if($response && count(json_decode($response)) > 0) {
            foreach (json_decode($response) as $value) {
                $value->distance = $this->distance($report->lat, $report->long, $value->latitude, $value->longitude, 'K');
                $data[] = $value;
            }
            return $data;
        } else {
            return array();
        }
    }
    public function getWasteGreenCart($reportId, $template='classic'){
        $report=Report::findOrfail($reportId);
        $response=$this->getApiCache($reportId,'waste_green_cart');

        if($response==NULL){
            $url='https://data.calgary.ca/resource/g5k5-gjns.json?$limit=1&$where=within_circle(location, [lat], [long], [radius])';
            // $url.='&clect_type=Blue';
            $url.='&commodity=Green';
            $url=str_replace('[lat]',$report->lat,$url);
            $url=str_replace('[long]',$report->long,$url);
            $url=str_replace('[radius]',config('app.radius'),$url);
            $url.='&$order=distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\')&$select=*, distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\') AS range';
      
            $response=$this->getApiData($reportId,$url,'waste_green_cart');
        }
        $data = array();
        if($response && count(json_decode($response)) > 0) {
            foreach (json_decode($response) as $value) {
                $value->distance = $this->distance($report->lat, $report->long, $value->latitude, $value->longitude, 'K');
                $data[] = $value;
            }
            return $data;
        } else {
            return array();
        }
    }


    public function getRentalVsOwned($reportId, $template='classic') {
        try{
            $response=$this->getRentalVsOwnedData($reportId, $template);
            $noOfHouseOwned = 0;
            $noOfHouseRented = 0;
            foreach ($response as $key => $val) {
                $noOfHouseOwned += intval($val->owned);
                $noOfHouseRented += intval($val->rented);
            }
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

    public function getRentalVsOwnedData($reportId, $template='classic') {
        $report=Report::findOrfail($reportId);
        $response=NULL;
        $neighborhood=$this->getCommunity($reportId);
        if($neighborhood){
            $response=$this->getApiCache($reportId,'demographyrentalvsowned');
            if($response==NULL){
                $url='https://data.edmonton.ca/resource/3p9s-5j49.json?neighbourhood='.strtoupper($neighborhood);
                $response=$this->getApiData($reportId,$url,'demographyrentalvsowned');
            }
        }
        return json_decode($response);
    }

    public function getAgeChart($reportId, $template='classic'){
    	$response=$this->getAgeChartData($reportId, $template);
    	$data['response']=$response[0];
    	return view('reports.'.$this->cityName.'.'.$template.'.demobyage',$data);
    }    

    public function getEduChart($reportId, $template='classic'){
    	$response=$this->getEduChartData($reportId, $template);
    	$data['response']=$response[0];
    	return view('reports.'.$this->cityName.'.'.$template.'.demobyedu',$data);
    }

    public function getCatholicData($reportId, $template='classic'){
    	$report=Report::findOrfail($reportId);
    	$response=$this->getApiCache($reportId,'catholic');

    	if($response==NULL){
	    	$url='https://data.edmonton.ca/resource/sujy-pr3p.json?$limit=2&$where=within_circle(location, [lat], [long], [radius])&grade_level=Elementary';
	        $url=str_replace('[lat]',$report->lat,$url);
	        $url=str_replace('[long]',$report->long,$url);
	        $url=str_replace('[radius]',config('app.radius'),$url);
	        $url.='&$order=distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\')&$select=*, distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\') AS range';
      
	        $response=$this->getApiData($reportId,$url,'catholic');
    	}
        $data = array();
        if(count(json_decode($response)) > 0) {
            foreach (json_decode($response) as $value) {
                $value->distance = $this->distance($report->lat, $report->long, $value->latitude, $value->longtitude, 'K');
                $data[] = $value;
            }
            return ['response'=>$data];
        } else {
            return ['response'=>array()];
        }
    }
    public function getRecreationData($reportId, $template='classic'){
        $report=Report::findOrfail($reportId);
        $response=$this->getApiCache($reportId,'recreation');

        if($response==NULL){
            //$url='https://data.edmonton.ca/resource/7adu-gzpk.json?$limit=1&$where=within_circle(location, [lat], [long], [radius])&grade_level=Elementary';
            $url='https://data.calgary.ca/resource/cedp-v9s9.json?$limit=1&$where=within_circle(location, [lat], [long], [radius])';
            
            $url=str_replace('[lat]',$report->lat,$url);
            $url=str_replace('[long]',$report->long,$url);
            $url=str_replace('[radius]',config('app.radius'),$url);
            $url.='&$order=distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\')&$select=*, distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\') AS range';

            $response=$this->getApiData($reportId,$url,'recreation');
        }
        $data = array();
        if(count(json_decode($response)) > 0) {
            foreach (json_decode($response) as $value) {
                $value->distance = $this->distance($report->lat, $report->long, $value->latitude, $value->longitude, 'K');
                $data[] = $value;
            }
            return ['response'=>$data[0]];
        } else {
            return ['response'=>array()];
        }

    }
    public function getSchoolData($reportId, $template='classic'){
        //https://data.calgary.ca/Services-and-Amenities/School-Locations/fd9t-tdn2
    	$data['elementerySchool']=$this->getElementerySchool($reportId, $template);
        $data['juniorSchool']=$this->getJuniorSchool($reportId, $template);
    	$data['highSchool']=$this->getHighSchool($reportId, $template);

    	return $data;
    }       
    public function getElementerySchool($reportId, $template='classic'){
    	$report=Report::findOrfail($reportId);
    	$response=$this->getApiCache($reportId,'elementryschools');

    	if($response==NULL){
	    	$url='https://data.calgary.ca/resource/gddc-smf3.json?$limit=1&$where=within_circle(location, [lat], [long], [radius])&elem=Y';
	        $url=str_replace('[lat]',$report->lat,$url);
	        $url=str_replace('[long]',$report->long,$url);
	        $url=str_replace('[radius]',config('app.radius'),$url);
	        $url.='&$order=distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\')&$select=*, distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\') AS range';
      
	        $response=$this->getApiData($reportId,$url,'elementryschools');
    	}
        $data = array();
        if(count(json_decode($response)) > 0) {
            foreach (json_decode($response) as $value) {
                $value->distance = $this->distance($report->lat, $report->long, $value->latitude, $value->longitude, 'K');
                $data[] = $value;
            }
            return $data[0];
        } else {
            return array();
        }
    }    
    public function getJuniorSchool($reportId, $template='classic'){
        $report=Report::findOrfail($reportId);
        $response=$this->getApiCache($reportId,'juniorschools');

        if($response==NULL){
            $url='https://data.calgary.ca/resource/gddc-smf3.json?$limit=1&$where=within_circle(location, [lat], [long], [radius])&junior_h=Y';
            $url=str_replace('[lat]',$report->lat,$url);
            $url=str_replace('[long]',$report->long,$url);
            $url=str_replace('[radius]',config('app.radius'),$url);
            $url.='&$order=distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\')&$select=*, distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\') AS range';
            $response=$this->getApiData($reportId,$url,'juniorschools');
        }
        $data = array();
        if(count(json_decode($response)) > 0) {
            foreach (json_decode($response) as $value) {
                $value->distance = $this->distance($report->lat, $report->long, $value->latitude, $value->longitude, 'K');
                $data[] = $value;
            }
            return $data[0];
        } else {
            return array();
        }

    }

    public function getHighSchool($reportId, $template='classic'){
    	$report=Report::findOrfail($reportId);
    	$response=$this->getApiCache($reportId,'highschools');

    	if($response==NULL){
	    	$url='https://data.calgary.ca/resource/gddc-smf3.json?$limit=1&$where=within_circle(location, [lat], [long], [radius])&senior_h=Y';
	        $url=str_replace('[lat]',$report->lat,$url);
	        $url=str_replace('[long]',$report->long,$url);
	        $url=str_replace('[radius]',config('app.radius'),$url);
	        $url.='&$order=distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\')&$select=*, distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\') AS range';
      
	        $response=$this->getApiData($reportId,$url,'highschools');
    	}
        $data = array();
        if(count(json_decode($response)) > 0) {
            foreach (json_decode($response) as $value) {
                $value->distance = $this->distance($report->lat, $report->long, $value->latitude, $value->longitude, 'K');
                $data[] = $value;
            }
            return $data[0];
        } else {
            return array();
        }

    }
    public function getCommunitycenterdata($reportId, $template='classic'){
    	

    	$report=Report::findOrfail($reportId);
    	$response=$this->getApiCache($reportId,'communitycenter');
    	if($response==NULL){
	    	$url='https://data.calgary.ca/resource/4mgb-5v5u.json?$limit=2&$where=within_circle(location, [lat], [long], [radius])&type=Community Centre';
	        $url=str_replace('[lat]',$report->lat,$url);
	        $url=str_replace('[long]',$report->long,$url);
	        $url=str_replace('[radius]',config('app.radius'),$url);
	        $url.='&$order=distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\')&$select=*, distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\') AS range';
	        $response=$this->getApiData($reportId,$url,'communitycenter');
    	}
        $data = array();
        if(count(json_decode($response)) > 0) {
            foreach (json_decode($response) as $value) {
                $value->distance = $this->distance($report->lat, $report->long, $value->latitude, $value->longitude, 'K');
                $value->address = $value->address;
                $data[] = $value;
            }
            usort($data, function($a, $b) {
                return $a->distance > $b->distance;
            });
        	return ['response'=>$data];
        } else {
            return ['response'=>array()];
        }
    }



    public function getgoogleaddress($lat,$lng)
    {
	$url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".trim($lat).",".trim($lng)."&key=".env('GOOGLE_MAP_API');
	$json = @file_get_contents($url);
	$data=json_decode($json);
	$status = $data->status;
	if($status=="OK")
	{
		return $data->results[0]->formatted_address;
	}
	else
	{
		return false;
	}
    }
    public function getLibraryData($reportId, $template='classic'){
    	$report=Report::findOrfail($reportId);
    	$response=$this->getApiCache($reportId,'library');

    	if($response==NULL){
	    	$url='https://data.calgary.ca/resource/j5v6-8bqr.json?$limit=1&$where=within_circle(location, [lat], [long], [radius])';
	        $url=str_replace('[lat]',$report->lat,$url);
	        $url=str_replace('[long]',$report->long,$url);
	        $url=str_replace('[radius]',config('app.radius'),$url);
	        $url.='&$order=distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\')&$select=*, distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\') AS range';
      
	        $response=$this->getApiData($reportId,$url,'library');
    	}

        if(count(json_decode($response)) > 0) {
            foreach (json_decode($response) as $value) {
                $value->distance = $this->distance($report->lat, $report->long, $value->location->coordinates[1], $value->location->coordinates[0], 'K');
                $data[] = $value;
            }
            return ['response'=>$data[0]];
        } else {
            return ['response'=>array()];
        }
    }   


    public function getTransitData($reportId, $template='classic')
    {
        $data['lrt_data']=$this->getTransitLrtData($reportId);
        $data['bus_data']=$this->getTransitBusData($reportId);
        return $data;
    }
    public function getTransitLrtData($reportId, $template='classic')
    {
        $report=Report::findOrfail($reportId);
        $response=$this->getApiCache($reportId,'transitLrt');

        if($response==NULL){
            //$url='https://data.edmonton.ca/resource/7adu-gzpk.json?$limit=1&$where=within_circle(location, [lat], [long], [radius])&grade_level=Elementary';
            $url='https://data.calgary.ca/resource/5cvt-rikk.json?$limit=1&$where=within_circle(location, [lat], [long], [radius])';
            $url=str_replace('[lat]',$report->lat,$url);
            $url=str_replace('[long]',$report->long,$url);
            $url=str_replace('[radius]',config('app.radius'),$url);
            $url.='&$order=distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\')&$select=*, distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\') AS range';

            $response=$this->getApiData($reportId,$url,'transitLrt');
        }
        $data = array();
        if(count(json_decode($response)) > 0) {
            foreach (json_decode($response) as $value) {
                $value->distance = $this->distance($report->lat, $report->long, $value->latitude, $value->longitude, 'K');
                $data[] = $value;
            }
        }
        //return ['response'=>$data, 'lrt_response'=>$lrt_data];
        return $data;
    }
    public function getTransitBusData($reportId, $template='classic')
    {
        $data = array();
        $report=Report::findOrfail($reportId);
        $busData = DB::select("
            SELECT *, 
                ((ACOS(SIN(? * PI() / 180) * SIN(`stop_lat` * PI() / 180) + COS(? * PI() / 180) * COS(`stop_lat` * PI() / 180) * COS((? - `stop_lon`) * PI() / 180)) * 180 / PI()) * 60 * 1.1515 * 1.609344) AS `distance`
            FROM
                `calgary_bus_stops`
            HAVING `distance` <= ".(config('app.radius')/1000)."
            ORDER BY `distance` ASC
            LIMIT 1", [$report->lat, $report->lat, $report->long]
        );
        if (count($busData)) {
            return $busData;
        } else {
            return $data;
        }
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
    public function getMapData($reportId, $template='classic'){
        $report=Report::findOrfail($reportId);
        $data = array();
        $resturants=$this->getResturantData($reportId);

        if (!empty($resturants->results)) {
            foreach ($resturants->results as $key => $value) {
                $distance = $this->distance($report->lat, $report->long, $value->geometry->location->lat, $value->geometry->location->lng, 'K');
                $data['resturants'][] = array('distance' => $distance, 'name' => $value->name, 'vicinity' => $value->vicinity);
            }
        }
        
        $banks=$this->getBankData($reportId);
        if (!empty($banks->results)) {
            foreach ($banks->results as $key => $value) {
                $distance = $this->distance($report->lat, $report->long, $value->geometry->location->lat, $value->geometry->location->lng, 'K');
                $data['banks'][] = array('distance' => $distance, 'name' => $value->name, 'vicinity' => $value->vicinity);
            }
        }

        $conStores=$this->getConStoreData($reportId);
        if (!empty($conStores->results)) {
            foreach ($conStores->results as $key => $value) {
                $distance = $this->distance($report->lat, $report->long, $value->geometry->location->lat, $value->geometry->location->lng, 'K');
                $data['conStores'][] = array('distance' => $distance, 'name' => $value->name, 'vicinity' => $value->vicinity);
            }
        }

        $gasstations=$this->getGasstationData($reportId);

        if (!empty($gasstations->results)) {
            foreach ($gasstations->results as $key => $value) {
                $distance = $this->distance($report->lat, $report->long, $value->geometry->location->lat, $value->geometry->location->lng, 'K');
                $data['gasstations'][] = array('distance' => $distance, 'name' => $value->name, 'vicinity' => $value->vicinity);
            }
        }
        
        $cafe=$this->getCafeData($reportId);
        if (!empty($cafe->results)) {
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
        /*
        foreach ($wificenters['response'] as $key => $value) {
            $distance = $this->distance($report->lat, $report->long, $value->latitude, $value->longitude, 'K');
            $data['wificenters'][] = array('distance' => $distance, 'address' => $value->address, 'facility_type' => $value->facility_type, 'location_name' => $value->location_name, 'status' => $value->status, 'wifiprovider' => $value->wifiprovider);
        }
        */
        $attraction=$this->getAttractiondata($reportId);
        foreach ($attraction['response'] as $key => $value) {
            $distance = $this->distance($report->lat, $report->long, $value->latitude, $value->longitude, 'K');
            $data['attraction'][] = array('distance' => $distance, 'name' => $value->name, 'vicinity' => $value->address);
        }

        return ['response'=>$data];
    }
    /*
    public function getWifiCenterData($reportId){

        try{
            $report=Report::findOrfail($reportId);
            $response=$this->getApiCache($reportId,'wifi_center');
            if($response==NULL){
                $url='https://data.edmonton.ca/resource/5esz-mad5.json?$limit=2&$where=within_circle(location, [lat], [long], [radius])';
                $url=str_replace('[radius]',config('app.radius'),$url);
                $url=str_replace('[lat]',$report->lat,$url);
                $url=str_replace('[long]',$report->long,$url);
                $url.='&$order=distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\')';
                $response=$this->getApiData($reportId,$url,'wifi_center');
            }
            return ['response'=>json_decode($response)];

        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }
    */

    public function getAttractiondata($reportId, $template='classic'){
        

        $report=Report::findOrfail($reportId);
        $response=$this->getApiCache($reportId,'communitycenter');
        if($response==NULL){
            $url='https://data.calgary.ca/resource/4mgb-5v5u.json?$limit=2&$where=within_circle(location, [lat], [long], [radius])&type=Attraction';
            $url=str_replace('[lat]',$report->lat,$url);
            $url=str_replace('[long]',$report->long,$url);
            $url=str_replace('[radius]',config('app.radius'),$url);
            $url.='&$order=distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\')&$select=*, distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\') AS range';
            $response=$this->getApiData($reportId,$url,'communitycenter');
        }
        $data = array();
        if(count(json_decode($response)) > 0) {
            return ['response'=>json_decode($response)];
        } else {
            return ['response'=>array()];
        }
    }



}
