<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    function dateNow(){
        return date("Y-m-d");
    }

    function dateTimeNow(){
        return date("Y-m-d H:i:s");
    }

    function addDateNow($from, $day){
        $add = $from > 0 ? " +".$day." day" : " -".$day." day";
        return date("Y-m-d", strtotime($from.$add));
    }

    function addDateTimeNow($minute){
        $second = intval($minute) * 60;
        return date("Y-m-d H:i:s", time() + $second);
    }

    function getMonthName($id){
        $bulan1 = array(1=>'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        return $bulan1[$id];
    }

    function getShortMonthName($id){
        $bulan2	= array(1=>'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
        return $bulan2[$id];
    }

    function randomNumber($from, $to){
        return rand($from, $to);
    }

    function is_decimal( $val ){
        return is_numeric( $val ) && floor( $val ) != $val;
    }

    function validEmail($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    function array2object($d) {
        if (is_array($d)) return (object) array_map(__FUNCTION__, $d);
        else return $d;
    }

    function object2array($d) {
        if (is_object($d)) $d = get_object_vars($d);
        if (is_array($d)) return array_map(__FUNCTION__, $d);
        else return $d;
    }

    function dump($arg, $formated=true) {
        if (is_string($arg) && preg_match("/xml/i", $arg)) {
            echo header("Content-type: application/xml");
            echo $arg;
        }
        else {
            if($formated) echo "<br /><pre>";
            if(is_string($arg)) echo $arg;
            else print_r($arg);
            if($formated) echo "</pre>";
        }
        die();
    }

    function dump_xml($xml, $header=false) {
        echo header("Content-type: application/xml");
        if($header) echo '<?xml version="1.0" encoding="utf-8"?>' . "\n";
        echo $xml;
        die();
    }

    function dump_error($str) {
        $fh = fopen("/www/__logs/debug.txt", 'w');
        fwrite($fh, $str);
        fclose($fh);
    }

    function _xml2array( $input, $callback = NULL, $_recurse = FALSE ) {
        $data = ( ( !$_recurse ) && is_string( $input ) ) ? simplexml_load_string( $input ) : $input;
        if ( $data instanceof SimpleXMLElement ) $data = (array) $data;
        if ( is_array( $data ) ) foreach ( $data as &$item ) $item = _xml2array( $item, $callback, TRUE );
        return ( !is_array( $data ) && is_callable( $callback ) ) ? call_user_func( $callback, $data ) : $data;
    }