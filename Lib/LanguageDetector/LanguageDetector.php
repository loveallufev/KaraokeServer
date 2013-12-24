<?php
/**
 * Created by PhpStorm.
 * User: loveallufev
 * Date: 12/24/13
 * Time: 5:02 AM
 */

require_once SERVER_ROOT . "/Lib/LanguageDetector/" . 'classifier.php';

class Lib_LanguageDetector_LanguageDetector {

    private $classification;// = new NGramProfiles('etc/classifiers/ngrams.dat');

    public function __construct(){
        try{
            $this->classification = new NGramProfiles(SERVER_ROOT . "/Lib/LanguageDetector/" . "etc/classifiers/full.dat");
        }
        catch (Exception $e){
            echo $e->getMessage();
        }


        if( !$this->classification->exists() ) {
            echo "Training" . "<br/>";

            $this->classification->train('en', SERVER_ROOT . "/Lib/LanguageDetector/" . 'etc/data/english.raw');
            echo "Training english finish" . "<br/>";
            $this->classification->train('nl', SERVER_ROOT . "/Lib/LanguageDetector/" . 'etc/data/dutch.raw');
            $this->classification->train('fr', SERVER_ROOT . "/Lib/LanguageDetector/" . 'etc/data/french.raw');
            $this->classification->train('de', SERVER_ROOT . "/Lib/LanguageDetector/" . 'etc/data/german.raw');
            $this->classification->train('id', SERVER_ROOT . "/Lib/LanguageDetector/" . 'etc/data/indonesian.raw');
            $this->classification->train('jp', SERVER_ROOT . "/Lib/LanguageDetector/" . 'etc/data/japanese.raw');
            $this->classification->train('pt', SERVER_ROOT . "/Lib/LanguageDetector/" . 'etc/data/portugese.raw');
            $this->classification->train('es', SERVER_ROOT . "/Lib/LanguageDetector/" . 'etc/data/spanish.raw');
            $this->classification->train('vi', SERVER_ROOT . "/Lib/LanguageDetector/" . 'etc/data/vietnamese.raw');
            echo "Before saving" . "<br/>";
            $this->classification->save();
            echo "Saving" . "<br/>";
        } else {
            $this->classification->load();
        }
    }

    public function predict($text) {
        $language = $this->classification->predict($text);
        return $language;
    }
} 