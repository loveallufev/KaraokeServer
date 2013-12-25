<?php
/**
 * Created by PhpStorm.
 * User: loveallufev
 * Date: 12/25/13
 * Time: 7:46 PM
 */

abstract class Model_AbstractAssistant {
    public $config;
    public $lang;

    // Z for zing, L for luckyvoice
    public $prefix;

    public abstract  function searchByName($songName);
    public abstract  function getHotKaraoke();
    public abstract  function getInfo($id);
    public abstract function getSuggestionByKeyword($songName);

} 