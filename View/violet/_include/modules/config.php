<?php
    // Apptastik PHP - Configuration File
    // This file configures the paths and some of the fixed variables
    // Please input your paths correctly, as this is the main config file of the site
    // You can also add some more to this if you need, makes it easyer to paths thruout the site.

    $site_dir = BASE_URL;// "http://localhost/apptastik/php";  // no ending slash !!!
    $img_dir = BASE_URL . DS . "View" . DS . MY_THEME . DS . "_include/images";	// no ending slash !!!
    $js_dir = BASE_URL . DS . "View" . DS . MY_THEME . DS . "_include/js";  // no ending slash !!!
    $css_dir = BASE_URL . DS . "View" . DS . MY_THEME . DS . "_include/css"; // no ending slash !!!
    $flash_dir = BASE_URL . DS . "View" . DS . MY_THEME . DS . "_include/flash"; // no ending slash !!!
    $local_font_dir = BASE_URL . DS . "View" . DS . MY_THEME . DS . "_include/fonts"; // no ending slash !!!
    $online_font_dir = "http://www.bogdanrosu.com/temp/fonts"; // no ending slash !!!
    $vid_dir = BASE_URL . DS . "View" . DS . MY_THEME . DS . "_include/videos"; // no ending slash !!!
    $site_name = "USS Karaoke";
    $site_keywords = "Karaoke, USS Karaoke, hat karaoke online, hát karaoke trực tuyến, sing karaoke";
    $site_description = "Sing karaoke every time, everywhere and share to others";
    $copy = "&copy; " . date("Y") .  " Uranus Software Solution. All rights reserved.";
    $author = "USS";
    $ga = "UA-47854507-1"; // google analytics tracking id
    $page_encoding = "text/html; charset=utf-8";   // page encoding
    $gallery_dir = "View" . DS . MY_THEME . DS . "gallery-images";
    //$language = "en-US";  // page language
    $language = "en-US";
?>