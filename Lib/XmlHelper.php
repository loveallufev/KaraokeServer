<?php
/**
 * File : XmlHelper.php
 * User : loveallufev
 * Date:  5/19/13
 * Group: Hieu-Trung
*/

    function XmlToArray($xml) {
        $array = json_decode(json_encode($xml), TRUE);

        foreach ( array_slice($array, 0) as $key => $value ) {
            if ( empty($value) ) $array[$key] = NULL;
            elseif ( is_array($value) ) $array[$key] = (array)($value);
        }

        return $array;
    }

    function JsonToArray($json){
        $array = json_decode($json, TRUE);

        foreach ( array_slice($array, 0) as $key => $value ) {
            if ( empty($value) ) $array[$key] = NULL;
            elseif ( is_array($value) ) $array[$key] = (array)($value);
        }

        return $array;
    }

    function ArrayToXml($data, $rootNodeName = 'data', $xml=null)
    {
        // turn off compatibility mode as simple xml throws a wobbly if you don't.
        if (ini_get('zend.ze1_compatibility_mode') == 1)
        {
            ini_set ('zend.ze1_compatibility_mode', 0);
        }

        if ($xml == null)
        {
            $xml = simplexml_load_string("<?xml version='1.0' encoding='utf-8'?><$rootNodeName />");
        }

        // loop through the data passed in.
        foreach($data as $key => $value)
        {
            // no numeric keys in our xml please!
            if (is_numeric($key))
            {
                // make string key...
                $key = "unknownNode_". (string) $key;
            }

            // replace anything not alpha numeric
            $key = preg_replace('/[^a-z]/i', '', $key);

            // if there is another array found recrusively call this function
            if (is_array($value))
            {
                $node = $xml->addChild($key);
                // recrusive call.
                ArrayToXml($value, $rootNodeName, $node);
            }
            else
            {
                // add single node.
                $value = htmlentities($value);
                $xml->addChild($key,$value);
            }

        }
        // pass back as string. or simple xml object if you want!
        return $xml->asXML();
    }