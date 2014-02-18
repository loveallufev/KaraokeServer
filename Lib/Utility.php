<?php
/**
 * File : Utility.php
 * User : loveallufev
 * Date:  6/15/13
 * Group: Hieu-Trung
*/



class Lib_Utility {

    static $privateKey=1771541989;

    static public function wp_mktime($_timestamp = ''){
        if($_timestamp){
            $_split_datehour = explode(' ',$_timestamp);
            $_split_data = explode("-", $_split_datehour[0]);
            $_split_hour = explode(":", $_split_datehour[1]);

            return mktime ($_split_hour[0], $_split_hour[1], $_split_hour[2], $_split_data[1], $_split_data[2], $_split_data[0]);
        }
    }

    public static function SendRequest( $url, $method = 'GET', $data = array(),
                                        $headers = array(
                                            'Content-type: application/x-www-form-urlencoded',
                                            'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:26.0) Gecko/20100101 Firefox/26.0'
                                        ) )
    {
        $context = stream_context_create(array
        (
            'http' => array(
                'method' => $method,
                'header' => $headers,
                'content' => http_build_query( $data )
            )
        ));

        return file_get_contents($url, false, $context);
    }

    public static function post_request($url, $header ,$data, $method='POST') {

        $chunksize = 0.5 * (1024 * 1024); // 10 Megs

        // Convert the data array into URL Parameters like a=b&foo=bar etc.
        $data = http_build_query($data);

        // parse the given URL
        $url = parse_url($url);

        if ($url['scheme'] != 'http') {
            die('Error: Only HTTP request are supported !');
        }

        // extract host and path:
        $host = $url['host'];
        $path = $url['path'];


        if (isset($url['query']) && strlen($url['query']) > 0){
            $path.= '?' . $url['query'];
        }


        // open a socket connection on port 80 - timeout: 30 sec
        $fp = fsockopen($host, 80, $errno, $errstr, 30);

        $request = '';

        if ($fp){

            // send the request headers:
            $request .= $method . " $path HTTP/1.1\r\n";

            $request .= "Host: $host\r\n";

            foreach ($header as $v){
                $request .= $v . "\r\n";
            }

            $request .= "Content-length: ". strlen($data) ."\r\n\r\n";
            $request .= $data . "\r\n";

            fputs($fp, $request);

            $result = '';
            while ($line = fread($fp, 512)) {
                $result .= $line;
            }

        }
        else {
            return array(
                'status' => 'err',
                'error' => "$errstr ($errno)"
            );
        }

        // close the socket connection:
        fclose($fp);

        // split the result header from the content
        $result = explode("\r\n\r\n", $result, 2);

        $header = isset($result[0]) ? $result[0] : '';
        $status = '';
        $code = '';
        if ($header != ''){
            $start = strpos($header, "\r\n", 0);
            $tmp = explode(" ", substr($header, 0, $start));
            $status = $tmp[2];
            $code = $tmp[1];
        }
        $content = isset($result[1]) ? $result[1] : '';



        $h = Lib_Utility::parse_http_header($header);

        if (isset($h['transfer-encoding']) && $h['transfer-encoding'] == 'chunked'){
            $content = Lib_Utility::decode_chunked($content);
        }

        // return as structured array:
        return array(
            'status' => $status,
            'code' => $code,
            'header' => $header,
            'content' => $content
        );
    }

    private static function parse_http_header($str)
    {
        $lines = explode("\r\n", $str);
        $head  = array(array_shift($lines));
        foreach ($lines as $line) {
            list($key, $val) = explode(':', $line, 2);
            if ($key == 'Set-Cookie') {
                $head['Set-Cookie'][] = trim($val);
            } else {
                $head[$key] = trim($val);
            }
        }
        return $head;
    }

    private function decode_chunked($str) {
        for ($res = ''; !empty($str); $str = trim($str)) {
            $pos = strpos($str, "\r\n");
            $len = hexdec(substr($str, 0, $pos));
            $res.= substr($str, $pos + 2, $len);
            $str = substr($str, $pos + 2 + $len);
        }
        return $res;
    }



    public static function fail($pub, $pvt = '')
    {
        global $debug;
        $msg = $pub;
        if ($debug && $pvt !== '')
            $msg .= ": $pvt";
        /* The $pvt debugging messages may contain characters that would need to be
         * quoted if we were producing HTML output, like we would be in a real app,
         * but we're using text/plain here.  Also, $debug is meant to be disabled on
         * a "production install" to avoid leaking server setup details. */
        exit("An error occurred ($msg).\n");
    }

    public static function get_post_var($var)
    {
        $val = $_POST[$var];
        if (get_magic_quotes_gpc())
            $val = stripslashes($val);
        return $val;
    }

    public static function rglob($pattern='*', $flags = 0, $path='')
    {
        $paths=glob($path.'*', GLOB_MARK|GLOB_ONLYDIR|GLOB_NOSORT);
        $files=glob($path.$pattern, $flags);
        foreach ($paths as $path) { $files=array_merge($files,rglob($pattern, $flags, $path)); }
        return $files;
    }

    static function str_starts_with($haystack, $needle)
    {
        return strpos($haystack, $needle) === 0;
    }
    static function str_ends_with($haystack, $needle)
    {
        return strpos($haystack, $needle) + strlen($needle) ===
        strlen($haystack);
    }

    public static function checkRandomNumber($random){

        if (isset(Core::$config) &&
            isset(Core::$config['checkRandomNumber'])
            && Core::$config['checkRandomNumber'] == true){
            /*
            $now = gmdate("ymdHi");
            $minute = substr($now,8);
            $minuteZone = floor($minute/5);

            $time = substr($now,0,8);

            if ($minuteZone <= 5)
                $minuteZone = 2 << $minuteZone;

            $temp = $minuteZone*$minuteZone + 1;
            $hash='';

            if ($minuteZone % 2 == 0){
                $hash = $time * $temp - 1;
            }
            else{
                $hash = floor($time / $temp) + 1;
            }

            echo $hash;

            return ($hash == $random);
            */
            $random ^= Lib_Utility::$privateKey;
            $appTime = strrev($random);
            /*
            $dateString = date("Y-m-d\TH:i:s\Z", $random);
            $appTime = new DateTime($dateString, new DateTimeZone('UTC'));

            echo $appTime->format("Y-m-d\TH:i:s\Z") . "<br/>";


            $now =  new DateTime(date("Y-m-d\TH:i:s\Z", time()), new DateTimeZone('UTC'));
            echo $now->format("Y-m-d\TH:i:s\Z") . "<br/>";
            */

            $now = gmmktime();

            if (round(abs($now - $appTime) / 60,2) <= 5){
                return true;
            }
            return false;

        }

        return true;
    }

    public static function escapeCharacter($s){
        $t1 = array( "'", '"');
        $t2 = array("\'", '\"');
        $s = str_replace("\\", "\\\\", $s);
        return str_replace($t1,$t2, $s );
    }

    public static function command_exist($cmd) {
        $returnVal = shell_exec("which $cmd");
        return (empty($returnVal) ? false : true);
    }

}