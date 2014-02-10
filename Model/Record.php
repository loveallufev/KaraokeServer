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
    public $count;

    public static function getRecordByID($id){

        $model = new Core_Model();
        $model->getDB()->connect();
        $id = $model->getDB()->escape($id);
        $query = sprintf(
            'SELECT record.id,song.title, song.category, song.author,' .
            'record.ismixed, record.time, record.url, record.username, record.count ' .
            'FROM song,record WHERE song.customID=record.songid AND record.id=%s', $id);

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
        $record->count = $qresult->count;

        return $record;


    }

    public static function getRelatedRecordByUser($username) {


        $model = new Core_Model();
        $model->getDB()->connect();

        $username = $model->getDB()->escape($username);

        $query = sprintf(
            'SELECT record.id,song.title, song.category, song.author,' .
            'record.ismixed, record.time, record.url, record.username, record.count ' .
            'FROM song,record WHERE song.customID=record.songid AND record.username="%s" ORDER BY record.time DESC  LIMIT 0,10', ($username));

        $model->getDB()->prepare($query);
        if (!$model->getDB()->query()){
            $model->getDB()->disconnect();
            return null;
        }

        $qresult = $model->getDB()->fetch('array');
        $model->getDB()->disconnect();

        $result = array();
        if (isset($qresult)){
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
                $record->count = $s['count'];
                array_push($result,$record);
            }
        }

        return $result;

    }

    public static function updateCounterTo($record, $newvalue){
        $query = sprintf('UPDATE  `record` SET  `count` =%s WHERE id=%s', $newvalue, $record->id);
        $model = new Core_Model();
        $model->getDB()->connect();
        $model->getDB()->prepare($query);
        if (!$model->getDB()->query()){
            $model->getDB()->disconnect();
            return false;
        }

        $model->getDB()->disconnect();
        return true;
    }
} 