<?php
/**
 * Created by PhpStorm.
 * User: loveallufev
 * Date: 12/23/13
 * Time: 5:06 AM
 */

define('UNKNOWN', 'NA');

define('ZING_DOMAIN', 'http://star.zing.vn');
define('ZING_SONG_URL', '/includes/fnGetSongInfo.php?id=%s');
define('ZING_SEARCH_URL', '/star/search/%s.html?t=0&q=%s&x=66&y=9');
define('ZING_KARAOKE_HOT_URL', '/star/phongthu/index.html?alpha=all&sort=lanthu');

class Model_ZingAssistant extends  Model_AbstractAssistant{

    public function searchByName($songName){
        $songName = strtolower($songName);
        $songNameBreak = explode(" ",$songName);
        $url = sprintf(ZING_DOMAIN . ZING_SEARCH_URL, implode("-", $songNameBreak), implode("+", $songNameBreak));

        $html = Lib_Utility::SendRequest($url);
        $begin = strpos($html, '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tblstyle01">', 10000);
        $end = strpos($html, '</table>', $begin);
        $html =  substr($html, $begin, $end-$begin + 9);

        $DOM = new DOMDocument;
        $DOM->loadHTML('<?xml encoding="UTF-8">' . $html);
        $tag_tds = $DOM->getElementsByTagName('td');

        $songList = array();

        for ($i =6; $i < $tag_tds->length;){
            /*$p  = $tag_tds->item($i)->getElementsByTagName('a')->item(0);
            if ($p->hasAttributes()) {
                foreach ($p->attributes as $attr) {
                    $name = $attr->nodeName;
                    $value = $attr->nodeValue;
                    echo "Attribute '$name' :: '$value'<br />";
                }
            }*/

            $tmp = $tag_tds->item($i)->getElementsByTagName('a')->item(0)->getAttribute('onmouseover');
            $start = 15; $end = strpos($tmp,'</b>' ,$start);
            $title = substr($tmp, 14, $end - 14);
            $start = strpos($tmp, "<b class=\'user\'>", $end-1); $end = strpos($tmp, '</b>', $start);
            $author = substr($tmp, $start + 18, $end - $start - 18);
            $i++;

            $singer = $tag_tds->item($i)->getElementsByTagName('a')->item(0)->nodeValue;
            $i++;

            $category = $tag_tds->item($i)->getElementsByTagName('a')->item(0)->nodeValue;
            $i+=2;

            $tmp = $tag_tds->item($i)->getElementsByTagName('a')->item(0)->getAttribute('onclick');
            $start = strpos($tmp, '(', 1);
            $end = strpos($tmp, ')', $start);
            $ID = substr($tmp, $start + 1, $end - $start - 1);
            $i += 2;

            $song = new Model_BasicSong();
            $song->title = $title;
            $song->ID = $this->prefix . $ID;
            $song->singer = $singer;
            $song->author = $author;
            $song->category = $category;

            /* Get beat link and lyric link
            $url = sprintf(ZING_DOMAIN . ZING_SONG_URL,  $ID);

            $html = Lib_Utility::SendRequest($url);
            $html = str_replace('&', '&amp;', $html);
            $xml = simplexml_load_string($html);
            $song->beatURL = (string)$xml->karaokelink;
            $song->lyricURL = (string)$xml->lyric;
            $song->ID = $ID;

            End get beat & lyric link */

            array_push($songList,$song);
        }
        return $songList;
    }

    public  function getHotKaraoke(){
        $url = ZING_DOMAIN . ZING_KARAOKE_HOT_URL;

        $html = Lib_Utility::SendRequest($url);

        $begin = strpos($html, '<table width="100%" border="0" cellspacing="0" cellpadding="4" class="tblstyle01">', 14000);
        $end = strpos($html, '</table>', $begin);
        $html =  substr($html, $begin, $end-$begin + 9);

        $DOM = new DOMDocument;
        $DOM->loadHTML('<?xml encoding="UTF-8">' . $html);
        $tag_tds = $DOM->getElementsByTagName('td');

        $songList = array();

        /*
         * Skip 6 td tags:
         * <td width="35%" class="font_12">Tên bài hát</td>
						<td width="19%" class="font_12">Ca sĩ </td>
						<td width="19%" class="font_12">Thể loại </td>
						<td width="5%" class="font_12">Thu</td>
						<td width="5%">&nbsp;</td>
						<td width="6%">&nbsp;</td>
         * */
        for ($i =6; $i < $tag_tds->length;){
            try{
                /* <td <a title + author /a> /td> */
                $tmp = $tag_tds->item($i)->getElementsByTagName('a')->item(0)->getAttribute('onmouseover');
                $start = 15; $end = strpos($tmp,'</b>' ,$start);
                $title = substr($tmp, 14, $end - 14);
                $start = strpos($tmp, "<b class=\'user\'>", $end-1); $end = strpos($tmp, '</b>', $start);
                $author = substr($tmp, $start + 18, $end - $start - 18);
                $i++;

                /*<td singer>*/
                $singer = $tag_tds->item($i)->getElementsByTagName('a')->item(0)->nodeValue;
                $i++;

                /*<td category >*/
                $category = $tag_tds->item($i)->getElementsByTagName('a')->item(0)->nodeValue;
                $i+=3;
                /*Skip 2:
                * <td so luot thu>
                 * <td tim bai thu>
                 *
                */
                $tmp = $tag_tds->item($i)->getElementsByTagName('a')->item(0)->getAttribute('onclick');
                $start = strpos($tmp, '(', 1);
                $end = strpos($tmp, ')', $start);
                $ID = substr($tmp, $start + 1, $end - $start - 1);
                $i += 2;
                /*
                 * Skip: <td thu am>
                 */

                $song = new Model_BasicSong();
                $song->title = $title;
                $song->ID = $this->prefix . $ID;
                $song->singer = $singer;
                $song->author = $author;
                $song->category = $category;

                /* Get beat link and lyric link
                $url = sprintf(ZING_DOMAIN . ZING_SONG_URL,  $ID);

                $html = Lib_Utility::SendRequest($url);
                $html = str_replace('&', '&amp;', $html);
                $xml = simplexml_load_string($html);
                $song->beatURL = (string)$xml->karaokelink;
                $song->lyricURL = (string)$xml->lyric;
                $song->ID = $ID;
                 End get beat & lyric link */

                array_push($songList,$song);
            }
            catch (Exception $e){
                echo "Error:" . $e->getMessage();
            }
        }
        return $songList;
    }

    public function getInfo($id){
        $url = sprintf(ZING_DOMAIN . ZING_SONG_URL,  $id);

        $id = $this->prefix . $id;
        $html = Lib_Utility::SendRequest($url);
        $html = str_replace('&', '&amp;', $html);
        $xml = simplexml_load_string($html);

        $song = new Model_Song((string)$xml->title,(string)$xml->singer, (string)$xml->author, "", (string)$xml->type );

        $song->beatURL = (string)$xml->karaokelink;
        $song->lyricURL = (string)$xml->lyric;
        $song->ID = $id;
        $header = array(
            'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:26.0) Gecko/20100101 Firefox/26.0',
            'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
            'Accept-Language: vi-vn,vi;q=0.8,en-us;q=0.5,en;q=0.3',
            'Accept-Encoding: gzip, deflate',
            'DNT: 1',
            'Connection: Close'
        );


        //$response = Lib_Utility::post_request(str_replace(' ', '%20',$song->lyricURL), $header, array(), 'GET');
        $response = Lib_Utility::SendRequest(str_replace(' ', '%20',$song->lyricURL));
        $karaokexml = simplexml_load_string($response);

        $karaoke = new Model_LyricKaraoke();

        foreach($karaokexml->param as $sentense_raw){
            $sentence = new Model_Sentence();

            // 1 = one singer, 2 = second singer, 3 = both
            $gender = (string)$sentense_raw['s'] == 'm' ? 1 : ((string)$sentense_raw['s'] == 'f' ? 2 : 3);

            foreach($sentense_raw->i as $word){
                $content = (string)$word;
                if (strpos($content, '*') !== false) continue;
                $starttime = str_replace(' ', '', (string)$word['va']);
                $starttime = explode(':', $starttime);


                $minute = intval($starttime[0]);
                $sec = intval($starttime[1]);
                $milisec = intval($starttime[2]);

                $starttime = ($minute*60 + $sec)*1000 + $milisec;

                $w = new Model_Word();
                $w->content = $content;
                $w->start = $starttime;
                $w->gender = $gender;

                array_push($sentence->words, $w);
            }

            array_push($karaoke->sentences, $sentence);
        }

        $factor = array(0.1, 0.2,0.3, 0.4);

        foreach($karaoke->sentences as $sentence){
            $sum = 0;
            $index = 0;
            for ($i = 1; $i < sizeof($sentence->words); $i+=1){
                $sentence->words[$i-1]->end = $sentence->words[$i]->start - 5;
                if ($i >= sizeof($sentence->words) - sizeof($factor)){
                    $sum += (int)(($sentence->words[$i-1]->end - $sentence->words[$i-1]->start)*$factor[$index]);
                    $index++;
                }
            }
            $sentence->words[$i-1]->end = $sentence->words[$i-1]->start + $sum;
        }

        if ($response != null){
            $song->karaoke = json_encode($karaoke);
        }

        /* WRITE INFORMATION OF THIS SONG TO DATABASE */

        $song->insertThisIntoDatabase();

        /* END WRITING */

        /*  SAVE THIS SONG  */
        //$song->catcheThisSong();

        return $song;
    }


    public function getSuggestionByKeyword($songName){
        return null;
    }

    public static function provideMediaFileAction($link){

        $filename = basename($link);
        $ch = curl_init($link);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        $data = curl_exec($ch);
        curl_close($ch);

        if (preg_match('/Content-Length: (\d+)/', $data, $matches)) {
            // Contains file size in bytes
            $contentLength = (int)$matches[1];
        }


        $filesize = $contentLength;

        $offset = 0;
        $length = $filesize;
        $ctype = 'audio/mpeg';

        if ( isset($_SERVER['HTTP_RANGE']) ) {
            // if the HTTP_RANGE header is set we're dealing with partial content

            $partialContent = true;

            // find the requested range
            // this might be too simplistic, apparently the client can request
            // multiple ranges, which can become pretty complex, so ignore it for now
            preg_match('/bytes=(\d+)-(\d+)?/', $_SERVER['HTTP_RANGE'], $matches);

            $offset = intval($matches[1]);
            $length = intval($matches[2]) - $offset;
        } else {
            $partialContent = false;
        }

        if ( $partialContent ) {
            // output the right headers for partial content

            header('HTTP/1.1 206 Partial Content');

            header('Content-Range: bytes ' . $offset . '-' . ($offset + $length) . '/' . $filesize);
        }

// output the regular HTTP headers
        header('Content-Type: ' . $ctype);
        header('Content-Length: ' . $filesize);
        header('Content-Disposition: attachment; filename="' . $filename . '.mp3' . '"');
        header('Accept-Ranges: bytes');

// don't forget to send the data too
        echo $data;
    }
} 