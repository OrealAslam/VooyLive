<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\simple_html_dom;

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
        return ($html->find('a.geo-lbx')[8]->attr['data-dguid']);

       

    }

    public function get($postal)
    {
        $DA = $this->getDA($postal);
        $url ='https://www12.statcan.gc.ca/rest/census-recensement/CPR2016.json?lang=E&dguid='.$DA.'&topic=0&notes=0&stat=0';
        // dd($url);

        // $url='CPR2016.json';

        // get DOM from URL or file
        $json = file_get_contents($url);

        $data=json_decode($json,true);
        $data=$data["DATA"];
        return [
            'average_total_income' => $data[816][13],
            'owner'=>$data[1617][13],
            'rental'=>$data[1618][13],
            'household'=>$data[57][13],
            'medianage'=>$data[39][13]
        ];

    }
}
