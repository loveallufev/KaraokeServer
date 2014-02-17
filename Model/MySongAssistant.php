<?php
/**
 * Created by PhpStorm.
 * User: loveallufev
 * Date: 2/17/14
 * Time: 7:09 AM
 */

class Model_MySongAssistant extends Model_AbstractAssistant{

    public function searchByName($songName)
    {
        $model = new Core_Model();
        $model->getDB()->connect();

        $query = sprintf("SELECT * FROM song WHERE MATCH(title,singer,author,alias)"
            ." AGAINST('\"%s\"' IN BOOLEAN MODE) LIMIT %s,%s",
          $model->getDB()->escape($songName), 0,50
        );

        $model->getDB()->prepare($query);

        if (!$model->getDB()->query()){
            return null;
        }

        $songs = $model->getDB()->fetch('array');

        $result = array();
        if (isset($songs)){
            foreach($songs as $song){
                $s = new Model_Song($song['title'], $song['singer'], $song['author'], $song['lyric'], $song['category']);
                $s->ID = $song['customID'];
                //$s->beatURL = $song['beatURL'];
                //$s->karaoke = $song['karaoke'];
                //$s->lyricURL = $song['lyricURL'];
                $s->count = $song['count'];
                array_push($result, $s);
            }

        }

        return $result;


    }

    public function getHotKaraoke($lang='vi')
    {
        $assistant = Model_SongAssistantManager::getSongAssistantByLanguage($lang);

        $model = new Core_Model();
        $model->getDB()->connect();
        $prefix = (array)$assistant->prefix;

        $condition = '';
        foreach ($prefix as $p){
            $condition = $condition . " (customID LIKE '" . $p . "%') OR";
        }

        $condition = substr($condition,0,strlen($condition) -2);

        if (strlen(trim($condition)) == 0)
            $condition = " 1 ";


        $query = sprintf("SELECT * FROM song WHERE %s ORDER BY count DESC ,id DESC LIMIT 0,60", $condition);

        $model->getDB()->prepare($query);

        if (!$model->getDB()->query()){
            return null;
        }

        $songs = $model->getDB()->fetch('array');

        $result = array();
        if (isset($songs)){
            foreach($songs as $song){
                $s = new Model_Song($song['title'], $song['singer'], $song['author'], $song['lyric'], $song['category']);
                $s->ID = $song['customID'];
                //$s->beatURL = $song['beatURL'];
                //$s->karaoke = $song['karaoke'];
                //$s->lyricURL = $song['lyricURL'];
                $s->count = $song['count'];
                array_push($result, $s);
            }

        }

        return $result;
    }

    public function getInfo($id)
    {
        return Model_Song::getSongByID($id);
    }

    public function getSuggestionByKeyword($songName)
    {
        // TODO: Implement getSuggestionByKeyword() method.
    }
}