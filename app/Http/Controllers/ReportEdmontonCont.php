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


class ReportEdmontonCont extends ReportApiCont
{
    public $cityName = 'edmonton';

    public function getCommunity($reportId, $template='classic') {
    	$report=Report::findOrfail($reportId);
        /*
        getting neighbourhood from api
    	$response=$this->getApiCache($reportId,'neighbors');
    	if ($response==NULL) {
	    	$url='https://data.edmonton.ca/resource/4m8s-py9t.json?$limit=5&$where=within_circle(location, [lat], [long], [radius])';
                $url=str_replace('[radius]',config('app.radius'),$url);
                $url=str_replace('[lat]',$report->lat,$url);
                $url=str_replace('[long]',$report->long,$url);
                $url.='&$order=distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\')';
			$response=$this->getApiData($reportId,$url,'neighbors');
		}
		$response=json_decode($response);
		return $response[0]->name_mixed;
        */
        //new method getting neighbourhood name from database
        $resp=$this->getNeighborsData($reportId);
        //echo '<pre>';
        //print_r($resp['response'][0]->name);
        //die();
        return $resp['response'][0]->name;
    }
    /*
    public function getNeighborsData($reportId, $template='classic') {

        try{
            $report=Report::findOrfail($reportId);
            $response=$this->getApiCache($reportId,'neighbors');
            if ($response==NULL) {
	            $url='https://data.edmonton.ca/resource/4m8s-py9t.json?$limit=5&$where=within_circle(location, [lat], [long], [radius])';
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
    	$data['averageIncome']=$this->getAverageIncome($reportId, $template);
    	//$data['household']=$this->getHousehold($reportId);
        $data['rentalVsOwned']=$this->getRentalVsOwned($reportId, $template);
    	$data['medianAge']=$this->getMedianAge($reportId, $template);
    	$age=$this->getAgeChart($reportId, $template);
    	$edu=$this->getEduChart($reportId, $template);
    	$data['ageChart']=$age->render();
    	$data['eduChart']=$edu->render();
    	return $data;
    }
    public function getAverageIncome($reportId, $template='classic'){
        try{
	        $response=$this->getIncomeData($reportId, $template);
            if ($response && $response[0]) {
                $response=$response[0];
                $totalfrequency=0;

                $totalfrequency+=$response->less_than_30_000+$response->_30_000_to_less_than_60_000+$response->_60_000_to_less_than_100_000+$response->_100_000_to_less_than_125_000+$response->_125_000_to_less_than_150_000+$response->_150_000_to_less_than_200_000+$response->_200_000_to_less_than_250_000+$response->_250_000_or_more;

                $total=(($response->less_than_30_000*15000)+($response->_30_000_to_less_than_60_000*45000)+($response->_60_000_to_less_than_100_000*80000)+($response->_100_000_to_less_than_125_000*112500)+($response->_125_000_to_less_than_150_000*137500)+($response->_150_000_to_less_than_200_000*175000)+($response->_200_000_to_less_than_250_000*225000)+($response->_250_000_or_more*250000));
                if($totalfrequency>0)
                    $averageIncome=round($total/$totalfrequency,0);
                else
                $averageIncome='n/a';
            } else {
                $averageIncome='n/a';
            }
            return $averageIncome;
	    }
	    catch(Exception $e){
	        return $e->getMessage();
	    }

    }
    public function getIncomeData($reportId, $template='classic'){
    	$report=Report::findOrfail($reportId);
        $response=NULL;
        $neighborhood=$this->getCommunity($reportId);
        if($neighborhood){
        	$response=$this->getApiCache($reportId,'demographyincome');
        	if($response==NULL){
        		$url='https://data.edmonton.ca/resource/j5zx-3kz9.json?neighbourhood_name='.strtoupper($neighborhood);
        		$response=$this->getApiData($reportId,$url,'demographyincome');
        	}
        }
	    return json_decode($response);
    }     
    public function getAgeChartData($reportId, $template='classic'){
    	$report=Report::findOrfail($reportId);
        $response=NULL;
        $neighborhood=$this->getCommunity($reportId);
        if($neighborhood){
        	$response=$this->getApiCache($reportId,'demographyage');
        	if($response==NULL){
        		$url='https://data.edmonton.ca/resource/y8bi-vahs.json?neighbourhood_name='.strtoupper($neighborhood);
        		$response=$this->getApiData($reportId,$url,'demographyage');
        	}
        }
	    return json_decode($response);
    }    
     public function getMedianAge($reportId, $template='classic'){

	    try{
	       
	        $response=$this->getAgeChartData($reportId);
            if ($response && $response[0]) {
                $response=$response[0];

                 $totalfrequency=0;

                $totalfrequency+=$response->_0_4+$response->_5_9+$response->_10_14+$response->_25_29+$response->_15_19+$response->_20_24+$response->_30_34+$response->_35_39+$response->_40_44+$response->_45_49+$response->_50_54+$response->_55_59+$response->_60_64+$response->_65_69+$response->_70_74+$response->_75_79+$response->_80_84+$response->_85;

               

                $total=(($response->_0_4*2)+($response->_5_9*7)+($response->_10_14*12)+($response->_25_29*27)+($response->_15_19*17)+($response->_20_24*21)+($response->_30_34*32)+($response->_35_39*37)+($response->_40_44*42)+($response->_45_49*47)+($response->_50_54*52)+($response->_55_59*57)+($response->_60_64*62)+($response->_65_69*67)+($response->_70_74*72)+($response->_75_79*77)+($response->_80_84*82)+($response->_85*85));
                if($totalfrequency>0)
                    $medianAge=round($total/$totalfrequency,0);
                else
                    $medianAge='n/a';
            } else {
                $medianAge='n/a';
            }
            return $medianAge;
	    }
	    catch(Exception $e){
	        return NULL;
	    }
    } 

    public function getEduChartData($reportId, $template='classic'){
    	$report=Report::findOrfail($reportId);
        $response=NULL;
        $neighborhood=$this->getCommunity($reportId);
        if($neighborhood){
        	$response=$this->getApiCache($reportId,'demographyedu');

        	if($response==NULL){
        		 $url='https://data.edmonton.ca/resource/eypv-7bbj.json?neighbourhood_name='.strtoupper($neighborhood);
        		$response=$this->getApiData($reportId,$url,'demographyedu');
        	}
        }
	    return json_decode($response);
    }
    public function getHousehold($reportId, $template='classic'){

	    try{
	       
	        $response=$this->getAgeChartData($reportId);
            $response=$response[0];

             $totalfrequency=0;

            $totalfrequency+=$response->_0_4+$response->_5_9+$response->_10_14+$response->_25_29+$response->_15_19+$response->_20_24+$response->_30_34+$response->_35_39+$response->_40_44+$response->_45_49+$response->_50_54+$response->_55_59+$response->_60_64+$response->_65_69+$response->_70_74+$response->_75_79+$response->_80_84+$response->_85;

            $children=$response->_0_4+$response->_5_9+$response->_10_14+$response->_25_29+$response->_15_19;
            if($totalfrequency>0)
                $household=round($children/$totalfrequency*100,1);
            else
                $household='n/a';

            return $household;
	    }
	    catch(Exception $e){
	        return NULL;
	    }
    }


    public function getRentalVsOwned($reportId, $template='classic') {
        try{
            $response=$this->getRentalVsOwnedData($reportId);
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
        $data = array();
    	$response=$this->getAgeChartData($reportId);
        if ($response && $response[0]) {
    	   $data['response']=$response[0];
        }
    	return view('reports.'.$this->cityName.'.'.$template.'.demobyage',$data);
    }    

    public function getEduChart($reportId, $template='classic'){
        $data = array();
    	$response=$this->getEduChartData($reportId);
        if ($response && $response[0]) {
    	   $data['response']=$response[0];
        }
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
            $url='https://data.edmonton.ca/resource/7bzt-b9bj.json?$limit=1&$where=within_circle(location, [lat], [long], [radius])';
            
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
    	$data['elementerySchool']=$this->getElementerySchool($reportId);
        $data['juniorSchool']=$this->getJuniorSchool($reportId);
    	$data['highSchool']=$this->getHighSchool($reportId);

    	return $data;
    }       
    public function getElementerySchool($reportId, $template='classic'){
    	$report=Report::findOrfail($reportId);
    	$response=$this->getApiCache($reportId,'elementryschools');
        //https://data.edmonton.ca/resource/sujy-pr3p.json?$limit=1&$where=within_circle(location, 53.4490787, -113.57383400000003, 5000) AND grade_level like '%25Elementary%25'&$order=distance_in_meters(location, 'POINT (-113.57383400000003 53.4490787)')&$select=*, distance_in_meters(location, 'POINT (-113.57383400000003 53.4490787)') AS range


    	if($response==NULL){
	    	//$url='https://data.edmonton.ca/resource/sujy-pr3p.json?$limit=1&$where=within_circle(location, [lat], [long], [radius])&grade_level=Elementary';
            $url='https://data.edmonton.ca/resource/sujy-pr3p.json?$limit=1&$where=within_circle(location, [lat], [long], [radius]) AND grade_level like \'%25Elementary%25\'';
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
            //$url='https://data.edmonton.ca/resource/sujy-pr3p.json?$limit=1&$where=within_circle(location, [lat], [long], [radius])&grade_level=Junior';
            $url='https://data.edmonton.ca/resource/sujy-pr3p.json?$limit=1&$where=within_circle(location, [lat], [long], [radius]) AND grade_level like \'%25Junior%25\'';
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
	    	//$url='https://data.edmonton.ca/resource/sujy-pr3p.json?$limit=1&$where=within_circle(location, [lat], [long], [radius])&grade_level=Senior';
            $url='https://data.edmonton.ca/resource/sujy-pr3p.json?$limit=1&$where=within_circle(location, [lat], [long], [radius]) AND grade_level like \'%25Senior%25\'';
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
    public function getPlaygrounddata($reportId, $template='classic'){
    	$report=Report::findOrfail($reportId);
    	$response=$this->getApiCache($reportId,'playground');
    	if($response==NULL){
	    	$url='https://data.edmonton.ca/resource/vyix-4kxz.json?$limit=2&$where=within_circle(location, [lat], [long], [radius])';
	        $url=str_replace('[lat]',$report->lat,$url);
	        $url=str_replace('[long]',$report->long,$url);
	        $url=str_replace('[radius]',config('app.radius'),$url);
	        $url.='&$order=distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\')&$select=*, distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\') AS range';
	        $response=$this->getApiData($reportId,$url,'playground');
    	}
        $data = array();
        if(count(json_decode($response)) > 0) {
            foreach (json_decode($response) as $value) {
                $value->distance = $this->distance($report->lat, $report->long, $value->latitude, $value->longitude, 'K');
                $value->address = $this->getgoogleaddress($value->latitude, $value->longitude);
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
	    	$url='https://data.edmonton.ca/resource/rih6-94bn.json?$limit=1&$where=within_circle(location, [lat], [long], [radius])';
	        $url=str_replace('[lat]',$report->lat,$url);
	        $url=str_replace('[long]',$report->long,$url);
	        $url=str_replace('[radius]',config('app.radius'),$url);
	        $url.='&$order=distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\')&$select=*, distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\') AS range';
      
	        $response=$this->getApiData($reportId,$url,'library');
    	}

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

    public function getTransitData($reportId, $template='classic'){
    	$report=Report::findOrfail($reportId);
    	$response=$this->getApiCache($reportId,'transit');
        $lrt_array = array(
            array(
                'station' => 'Clareview',
                'address' => '48 Street & 139 Avenue',
                'grade_level' => 'Surface',
                'area' => 'Northeast',
                'opened' => '1981-04-26',
                'lat' => '53.601622',
                'long' => '-113.4140657'
            ),
            array(
                'station' => 'Belvedere',
                'address' => '62 Street & 129 Avenue',
                'grade_level' => 'Surface',
                'area' => 'Northeast',
                'opened' => '1978-04-22',
                'lat' => '53.6016048',
                'long' => '-113.4426542'
            ),
            array(
                'station' => 'Coliseum',
                'address' => '76 Street & 118 Avenue',
                'grade_level' => 'Surface',
                'area' => 'Northeast',
                'opened' => '1978-04-22',
                'lat' => '53.570617',
                'long' => '-113.458655'
            ),
            array(
                'station' => 'Stadium',
                'address' => '84 Street & 111 Avenue',
                'grade_level' => 'Surface',
                'area' => 'Northeast',
                'opened' => '1978-04-22',
                'lat' => '23.0653461',
                'long' => '72.5602822'
            ),
            array(
                'station' => 'Churchill',
                'address' => '99 Street & 102A Avenue',
                'grade_level' => 'Underground',
                'area' => 'Downtown',
                'opened' => '1978-04-22',
                'lat' => '53.5434601',
                'long' => '-113.4921599'
            ),
            array(
                'station' => 'Central',
                'address' => '101 Street & Jasper Avenue',
                'grade_level' => 'Underground',
                'area' => 'Downtown',
                'opened' => '1978-04-22',
                'lat' => '53.541047',
                'long' => '-113.486388'
            ),
            array(
                'station' => 'Bay / Enterprise Square',
                'address' => '104 Street & Jasper Avenue',
                'grade_level' => 'Underground',
                'area' => 'Downtown',
                'opened' => '1983-06-21',
                'lat' => '53.54093',
                'long' => '-113.5004587'
            ),
            array(
                'station' => 'Corona',
                'address' => '107 Street & Jasper Avenue',
                'grade_level' => 'Underground',
                'area' => 'Downtown',
                'opened' => '1983-06-21',
                'lat' => '53.542156',
                'long' => '-113.502309'
            ),
            array(
                'station' => 'Grandin / Government Centre',
                'address' => '110 Street & 99 Avenue',
                'grade_level' => 'Underground',
                'area' => 'Downtown',
                'opened' => '1989-09-01',
                'lat' => '53.5367641',
                'long' => '-113.51257'
            ),
            array(
                'station' => 'University',
                'address' => '114 Street & 89 Avenue',
                'grade_level' => 'Underground',
                'area' => 'South',
                'opened' => '1992-07-23',
                'lat' => '23.0387961',
                'long' => '72.5329574'
            ),
            array(
                'station' => 'Health Sciences / Jubilee',
                'address' => '114 Street & 83 Avenue',
                'grade_level' => 'Surface',
                'area' => 'South',
                'opened' => '2006-01-03',
                'lat' => '32.749757',
                'long' => '-97.3687548'
            ),
            array(
                'station' => 'McKernan / Belgravia',
                'address' => '114 Street & 76 Avenue',
                'grade_level' => 'Surface',
                'area' => 'South',
                'opened' => '2009-04-26',
                'lat' => '53.51295',
                'long' => '-113.5283141'
            ),
            array(
                'station' => 'South Campus/Fort Edmonton Park',
                'address' => '116 Street & 65 Avenue',
                'grade_level' => 'Surface',
                'area' => 'South',
                'opened' => '2009-04-26',
                'lat' => '53.503019',
                'long' => '-113.528874'
            ),
            array(
                'station' => 'Southgate',
                'address' => '111 Street & 48 Avenue',
                'grade_level' => 'Surface',
                'area' => 'South',
                'opened' => '2010-04-25',
                'lat' => '53.503019',
                'long' => '-113.528874'
            ),
            array(
                'station' => 'Century Park',
                'address' => '111 Street & 23 Avenue',
                'grade_level' => 'Surface',
                'area' => 'South',
                'opened' => '2010-04-25',
                'lat' => '53.458824',
                'long' => '-113.51572'
            ),
            array(
                'station' => 'NAIT',
                'address' => 'Princess Elizabeth and 107 Street',
                'grade_level' => 'Surface Station',
                'area' => 'Northwest',
                'opened' => '2015-09-06',
                'lat' => '53.5659106',
                'long' => '-113.507882'
            ),
            array(
                'station' => 'Kingsway/Royal Alex',
                'address' => 'Kingsway & 105 Street',
                'grade_level' => 'Surface Station',
                'area' => 'Northwest',
                'opened' => '2015-09-06',
                'lat' => '53.5577385',
                'long' => '-113.5035424'
            ),
            array(
                'station' => 'MacEwan',
                'address' => '105 Avenue & 104 Street',
                'grade_level' => 'Surface Station',
                'area' => 'Downtown',
                'opened' => '2015-09-06',
                'lat' => '53.5462344',
                'long' => '-113.5032216'
            ),
        );

    	if($response==NULL){
	    	$url='https://data.edmonton.ca/resource/hq5j-d489.json?$limit=1&$where=within_circle(location, [lat], [long], [radius])';
	        $url=str_replace('[lat]',$report->lat,$url);
	        $url=str_replace('[long]',$report->long,$url);
	        $url=str_replace('[radius]',config('app.radius'),$url);
	        $url.='&$order=distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\')&$select=*, distance_in_meters(location, \'POINT ('.$report->long.' '.$report->lat.')\') AS range';
      
	        $response=$this->getApiData($reportId,$url,'transit');
    	}
        $lrt_data = array();
        foreach ($lrt_array as $value) {
            $value['distance'] = $this->distance($report->lat, $report->long, $value['lat'], $value['long'], 'K');
            if(empty($lrt_data) || $value['distance'] < $lrt_data['distance'])
            {
                $lrt_data = $value;
            }
        }
        $data = array();
        foreach (json_decode($response) as $value) {
            $value->distance = $this->distance($report->lat, $report->long, $value->latitude, $value->longitude, 'K');
            $data[] = $value;
        }
    	return ['response'=>$data, 'lrt_response'=>$lrt_data];
    }
    public function getTransitStation($reportId, $template='classic'){
    	$report=Report::findOrfail($reportId);
    	$response=$this->getApiCache($reportId,'station');

    	if($response==NULL){
	    	$url="https://maps.googleapis.com/maps/api/place/nearbysearch/json?key=" .env('GOOGLE_MAP_API') . "&location=[lat],[long]&radius=[radius]&type=transit_station";
	        $url=str_replace('[lat]',$report->lat,$url);
	        $url=str_replace('[long]',$report->long,$url);
	        $url=str_replace('[radius]',config('app.radius'),$url);
      
	        $response=$this->getApiData($reportId,$url,'station');
    	}
    	$response=json_decode($response);
    	return $response;
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
    /*
    public function getWifiCenterData($reportId){
         return $this->getGoogleData($reportId,'wifi_center');
    }
    */
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
        $wificenters=$this->getWifiCenterData($reportId);
        if (!empty($wificenters['response'])) {
            foreach ($wificenters['response'] as $key => $value) {
                $distance = $this->distance($report->lat, $report->long, $value->latitude, $value->longitude, 'K');
                $data['wificenters'][] = array('distance' => $distance, 'address' => $value->address, 'facility_type' => $value->facility_type, 'location_name' => $value->location_name, 'status' => $value->status, 'wifiprovider' => $value->wifiprovider);
            }
        }
        return ['response'=>$data];
    }

    public function getWifiCenterData($reportId, $template='classic'){

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



}
