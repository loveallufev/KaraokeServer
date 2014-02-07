<?php
/**
 * Created by PhpStorm.
 * User: loveallufev
 * Date: 2/7/14
 * Time: 3:26 AM
 */

class Model_Record extends  Core_Model{

    public $id;
    public $time;
    public $title;
    public $author;
    public $url;
    public $user;
    public $category;
    public $ismixed;

    public static function getRecordByID($id){

        $model = new Core_Model();
        $model->getDB()->connect();
        $query = sprintf(
            'SELECT record.id,song.title, song.category, song.author,' .
            'record.ismixed, record.time, record.url, record.username ' .
            'FROM song,record WHERE song.customID=record.songid AND record.id=%s', mysql_real_escape_string($id));

        $model->getDB()->prepare($query);
        if (!$model->getDB()->query()){
            return null;
        }

        $qresult = $model->getDB()->fetch();
        $model->getDB()->disconnect();

        if (!isset($qresult))
            return null;

        $record = new Model_Record();
        $record->id = $qresult->id;
        $record->title = $qresult->title;
        $record->category = $qresult->category;
        $record->author = $qresult->author;
        $record->ismixed = $qresult->ismixed;
        $record->time = $qresult->time;
        $record->url = $qresult->url;
        $record->user = $qresult->username;

        return $record;


    }

    public static function getRelatedRecordByUser($username) {


        $model = new Core_Model();
        $model->getDB()->connect();
        $query = sprintf(
            'SELECT record.id,song.title, song.category, song.author,' .
            'record.ismixed, record.time, record.url, record.username ' .
            'FROM song,record WHERE song.customID=record.songid AND record.username="%s" ORDER BY record.time DESC  LIMIT 0,10', mysql_real_escape_string($username));

        $model->getDB()->prepare($query);
        if (!$model->getDB()->query()){
            return null;
        }

        $qresult = $model->getDB()->fetch('array');
        $model->getDB()->disconnect();

        $result = array();

        foreach ($qresult as $s){
            $record = new Model_Record();
            $record->id = $s['id'];
            $record->title = $s['title'];
            $record->category = $s['category'];
            $record->author = $s['author'];
            $record->ismixed = $s['ismixed'];
            $record->time = $s['time'];
            $record->url = $s['url'];
            $record->user = $s['username'];
            array_push($result,$record);
        }

        return $result;

    }
} 