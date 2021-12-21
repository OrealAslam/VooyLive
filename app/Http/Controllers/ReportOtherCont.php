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


class ReportOtherCont extends ReportApiCont
{
    public $cityName = 'edmonton';

    public function getNeighborsData($reportId, $template='classic')
    {
        // return null;
        $report=Report::findOrfail($reportId);

        return ['response'=>
        json_decode('[{"area_sq_km":"1.165427598207564","latitude":"53.46821272972758","location":{"type":"Point","coordinates":[-113.544452079528,53.468212729728]},"longitude":"-113.54445207952784","name_mixed":"Westbrook Estates","number":"5540"}        ,{"area_sq_km":"0.9170724937101165","latitude":"53.46431590241292","location":{"type":"Point","coordinates":[-113.527568844634,53.464315902413]},"longitude":"-113.52756884463375","name_mixed":"Sweet Grass","number":"5490"}
        ,{"area_sq_km":"0.44251268021730117","latitude":"53.45762655689604","location":{"type":"Point","coordinates":[-113.540194995943,53.457626556896]},"longitude":"-113.54019499594257","name_mixed":"Blue Quill Estates","number":"5070"}
        ,{"area_sq_km":"1.529887225660543","latitude":"53.471072653070806","location":{"type":"Point","coordinates":[-113.527505417018,53.471072653071]},"longitude":"-113.52750541701816","name_mixed":"Greenfield","number":"5220"}
        ,{"area_sq_km":"1.0580494678638934","latitude":"53.45762652276093","location":{"type":"Point","coordinates":[-113.526236532947,53.457626522761]},"longitude":"-113.52623653294697","name_mixed":"Blue Quill","number":"5060"}]')
        
        , 'report' => $report];
    }
    public function getCommunity($reportId, $template='classic') {
    	return 'Sample Community';
    }

    private function getDA($postal_code){
        return '35202135';
        //php simple dom call 

        //parse da

        //return da number

    }
    private function getCensusData($postal,$city){

// TODO do this testing
        $data=app('App\Http\Controllers\OtherDataController')->get($postal,$city);


        return $data;

    }


    public function getDemographyData($reportId, $template='classic'){
    	$report=Report::findOrfail($reportId);

         //get postal code
         $postal_code=$report->postal_code;

         //get DA value . dissemination area
 
 
         //call data extraction function
 
         $data = $this->getCensusData($report->postal_code, $report->City->name);
        //  dd($data);



    	$data['averageIncome']=$data['average_total_income'];
    	$data['household']=$data['household'];
        $data['rentalVsOwned']=$this->getRentalVsOwned($data);
    	$data['medianAge']=$data['medianage'];
    	$age=$this->getAgeChart($data, $template);
    	$edu=$this->getEduChart($data, $template);
    	$data['ageChart']=$age->render();
    	$data['eduChart']=$edu->render();
    	return $data;
    }
    public function getAverageIncome($reportId, $template='classic'){
        return 'n/a';
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
        return NULL;
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

    public function getRentalVsOwned($data) {
        $total = ((int)$data['owner']+(int)$data['rental']);
        
            return [
                'noOfHouseOwned' => $data['owner'],
                'noOfHouseRented' => $data['rental'],
                'totalHouse' => $total,
                'percentHouseOwned' => round((int)$data['owner']/$total * 100,2),
                'percentHouseRented' => round((int)$data['rental']/$total * 100,2)
                ];
        
    }

    
    public function getAgeChart($data, $template='classic'){
        $response = [
            'zero_to_nine' => ((int)$data['zero_to_four'] + (int)$data['five_to_nine']),
            'ten_to_nineteen' => ((int)$data['ten_to_fourteen'] + (int)$data['fifteen_to_nineteen']),
            'twenty_to_thirtyfour' => ((int)$data['twenty_to_twentyfour'] + (int)$data['twentyfive_to_twentynine'] + (int)$data['thirty_to_thirtyfour']),
            'thirtyfive_to_fortynine' => ((int)$data['thirtyfive_to_thirtynine'] + (int)$data['forty_to_fortyfour'] + (int)$data['fortyfive_to_fortynine']),
            'fifty_to_fiftyfour' => $data['fifty_to_fiftyfour'],
            'fiftyfive_to_sixtyfour' => ((int)$data['fiftyfive_to_fiftynine'] + (int)$data['sixty_to_sixtyfour']),
            'sixtyfive_to_sixtynine' => $data['sixtyfive_to_sixtynine'],
            'seventy_plus' => ((int)$data['sixtyfive_and_over'] - (int)$data['sixtyfive_to_sixtynine'])
        ];    
    	return view('reports.other.'.$template.'.demobyage', ['response' => $response]);
    }    

    public function getEduChart($data, $template='classic'){
        $response = [
            'university' => ((int)$data['bachelors_degree'] + (int)$data['university_certificate_below_bachelor'] + (int)$data['university_certificate_above_bachelor']),
            'college_certificate_diploma' => (int)$data['college_cegep_certificate'],
            'apprenticeship_or_trades' => (int)$data['apprenticeship_certificate'],
            'other' => (int)$data['no_certificate'],
            'high_school' => (int)$data['secondary_school_certificate'],
        ];
    	return view('reports.other.'.$template.'.demobyedu', ['response' => $response]);
    }
    public function getCatholicData($reportId, $template='classic'){
        return ['response'=>array()];

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
        return ['response'=>array()];

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
        return array();
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
        return array();
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
        return array();
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
        return ['response'=>array()];
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
        return ['response'=>array()];
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
	    	$url="https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=[lat],[long]&radius=[radius]&type=transit_station&key={{env('GOOGLE_MAP_API')}}";
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
        return ['response'=>NULL];
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
