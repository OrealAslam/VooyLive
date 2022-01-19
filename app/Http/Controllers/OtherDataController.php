<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\simple_html_dom;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Storage;

define('HDOM_TYPE_ELEMENT', 1);
define('HDOM_TYPE_COMMENT', 2);
define('HDOM_TYPE_TEXT', 3);
define('HDOM_TYPE_ENDTAG', 4);
define('HDOM_TYPE_ROOT', 5);
define('HDOM_TYPE_UNKNOWN', 6);
define('HDOM_QUOTE_DOUBLE', 0);
define('HDOM_QUOTE_SINGLE', 1);
define('HDOM_QUOTE_NO', 3);
define('HDOM_INFO_BEGIN', 0);
define('HDOM_INFO_END', 1);
define('HDOM_INFO_QUOTE', 2);
define('HDOM_INFO_SPACE', 3);
define('HDOM_INFO_TEXT', 4);
define('HDOM_INFO_INNER', 5);
define('HDOM_INFO_OUTER', 6);
define('HDOM_INFO_ENDSPACE', 7);

defined('DEFAULT_TARGET_CHARSET') || define('DEFAULT_TARGET_CHARSET', 'UTF-8');
defined('DEFAULT_BR_TEXT') || define('DEFAULT_BR_TEXT', "\r\n");
defined('DEFAULT_SPAN_TEXT') || define('DEFAULT_SPAN_TEXT', ' ');
defined('MAX_FILE_SIZE') || define('MAX_FILE_SIZE', 600000);
define('HDOM_SMARTY_AS_TEXT', 1);

class OtherDataController extends Controller
{
    private $DAs = array();

    private function file_get_html(
        $url,
        $use_include_path = false,
        $context = null,
        $offset = 0,
        $maxLen = -1,
        $lowercase = true,
        $forceTagsClosed = true,
        $target_charset = DEFAULT_TARGET_CHARSET,
        $stripRN = true,
        $defaultBRText = DEFAULT_BR_TEXT,
        $defaultSpanText = DEFAULT_SPAN_TEXT
    ) {
        if ($maxLen <= 0) {
            $maxLen = MAX_FILE_SIZE;
        }

        $dom = new simple_html_dom(
            null,
            $lowercase,
            $forceTagsClosed,
            $target_charset,
            $stripRN,
            $defaultBRText,
            $defaultSpanText
        );

        /**
         * For sourceforge users: uncomment the next line and comment the
         * retrieve_url_contents line 2 lines down if it is not already done.
         */
        $contents = file_get_contents(
            $url,
            $use_include_path,
            $context,
            $offset,
            $maxLen
        );
        // $contents = retrieve_url_contents($url);

        if (empty($contents) || strlen($contents) > $maxLen) {
            $dom->clear();
            return false;
        }

        return $dom->load($contents, $lowercase, $stripRN);
    }

    private function str_get_html(
        $str,
        $lowercase = true,
        $forceTagsClosed = true,
        $target_charset = DEFAULT_TARGET_CHARSET,
        $stripRN = true,
        $defaultBRText = DEFAULT_BR_TEXT,
        $defaultSpanText = DEFAULT_SPAN_TEXT
    ) {
        $dom = new simple_html_dom(
            null,
            $lowercase,
            $forceTagsClosed,
            $target_charset,
            $stripRN,
            $defaultBRText,
            $defaultSpanText
        );

        if (empty($str) || strlen($str) > MAX_FILE_SIZE) {
            $dom->clear();
            return false;
        }

        return $dom->load($str, $lowercase, $stripRN);
    }

    private function dump_html_tree($node, $show_attr = true, $deep = 0)
    {
        $node->dump($node);
    }

    public function getDA($postal){
        $postal=str_replace(' ','+',$postal);
        $url ='https://www12.statcan.gc.ca/census-recensement/2016/dp-pd/prof/search-recherche/results-resultats.cfm?Lang=E&TABID=2&G=1&Geo1=&Code1=&Geo2=&Code2=&SearchText='.$postal.'&wb-srch-pc=search';
        // return $url;
        $html = $this->file_get_html($url);
        
        $return = null;
        foreach($html->find('a.geo-lbx') as $elem)
        array_push($this->DAs,$elem->attr['data-dguid']);
        
        return array_pop($this->DAs);
    }

    private function getUpperDA(){
        if(count($this->DAs)-3)
        return $this->DAs[count($this->DAs)-3];
        else
        return array_pop($this->DAs);
    }

    public function fallBackDA($city){
        $city=str_replace(' ','+',$city);
        $url ='https://www12.statcan.gc.ca/census-recensement/2016/dp-pd/prof/search-recherche/results-resultats.cfm?Lang=E&TABID=1&G=1&Geo1=&Code1=&Geo2=&Code2=&type=0&SearchText='.$city.'&SearchType=Contains&wb-srch-place=search#';
        // return $url;
        $html = $this->file_get_html($url);

        $return = null;

        foreach($html->find('a.geo-lbx') as $elem)
        $return = $elem->attr['data-dguid'];

        return $return;

    }

    public function get($postal,$city)
    {
        if(Storage::exists('census/'.$postal.'.json')){
            $result=json_decode(Storage::get('census/'.$postal.'.json'));
            return (array)$result;
        }


        // dd($postal);
        $DA = $this->getDA($postal);
        $fallback = false;

        if(!$DA)
        {
            $fallback = true;
            $DA = $this->fallBackDA($city);
        }

        $data = $this->getDAData($DA);
       
        $result = $this->formatData($data);
        if($result['average_total_income'] == 0 && $fallback == false){
            $DA = $this->getUpperDA();
            // dd($DA);
            $data = $this->getDAData($DA);
            $upperResult = $this->formatData($data);
            if($upperResult['average_total_income'] != 0){
                $result= $upperResult;
            }
        }

        Storage::put('census/'.$postal.'.json', json_encode($result));


        return $result;
    }
    private function getDAData($DA){
        try {
            $url ='https://www12.statcan.gc.ca/rest/census-recensement/CPR2016.json?lang=E&dguid='.$DA.'&topic=0&notes=0&stat=0';

            $json = file_get_contents($url);

            $data=json_decode($json,true);
            return $data;

        } catch (Exception $e) {
            return null;
        }
        
    }
    private function formatData($data){
        if(isset($data["DATA"])){
            $data=$data["DATA"];
        }
       return [
            'average_total_income' => (!empty($data[816][13]) ? $data[816][13] : 0),
            'owner' => (!empty($data[1617][13]) ? $data[1617][13] : 0),
            'rental' => (!empty($data[1618][13]) ? $data[1618][13] : 0),
            'household' => (!empty($data[57][13]) ? $data[57][13] : 0),
            'medianage' => (!empty($data[39][13]) ? $data[39][13] : 0),
            'zero_to_four' => (!empty($data[9][13]) ? $data[9][13] : 0),
            'five_to_nine' => (!empty($data[10][13]) ? $data[10][13] : 0),
            'ten_to_fourteen' => (!empty($data[11][13]) ? $data[11][13] : 0),
            'fifteen_to_nineteen' => (!empty($data[13][13]) ? $data[13][13] : 0),
            'twenty_to_twentyfour' => (!empty($data[14][13]) ? $data[14][13] : 0),
            'twentyfive_to_twentynine' => (!empty($data[15][13]) ? $data[15][13] : 0),
            'thirty_to_thirtyfour' => (!empty($data[16][13]) ? $data[16][13] : 0),
            'thirtyfive_to_thirtynine' => (!empty($data[17][13]) ? $data[17][13] : 0),
            'forty_to_fortyfour' => (!empty($data[18][13]) ? $data[18][13] : 0),
            'fortyfive_to_fortynine' => (!empty($data[19][13]) ? $data[19][13] : 0),
            'fifty_to_fiftyfour' => (!empty($data[20][13]) ? $data[20][13] : 0),
            'fiftyfive_to_fiftynine' => (!empty($data[21][13]) ? $data[21][13] : 0),
            'sixty_to_sixtyfour' => (!empty($data[22][13]) ? $data[22][13] : 0),
            'sixtyfive_and_over' => (!empty($data[23][13]) ? $data[23][13] : 0),
            'sixtyfive_to_sixtynine' => (!empty($data[24][13]) ? $data[24][13] : 0),
            'bachelors_degree' => (!empty($data[1707][13]) ? $data[1707][13] : 0),
            'secondary_school_certificate' => (!empty($data[1699][13]) ? $data[1699][13] : 0),
            'university_certificate_below_bachelor' => (!empty($data[1705][13]) ? $data[1705][13] : 0),
            'university_certificate_above_bachelor' => (!empty($data[1706][13]) ? $data[1706][13] : 0),
            'college_cegep_certificate' => (!empty($data[1704][13]) ? $data[1704][13] : 0),
            'apprenticeship_certificate' => (!empty($data[1701][13]) ? $data[1701][13] : 0),
            'no_certificate' => (!empty($data[1698][13]) ? $data[1698][13] : 0),
            'couples_with_child' => (!empty($data[82][13]) ? $data[82][13] : 0),
            'couples_without_child' => (!empty($data[81][13]) ? $data[81][13] : 0),

       ];
    }
}
