<pre>
<?php
	include SERVER_ROOT . "/Lib/LanguageDetector/" . 'classifier.php';
	
	$classifier = new NGramProfiles('etc/classifiers/full.dat');
	$classifier->train('en', SERVER_ROOT . "/Lib/LanguageDetector/" . 'etc/data/english.raw');
	$classifier->train('nl', SERVER_ROOT . "/Lib/LanguageDetector/" . 'etc/data/dutch.raw');
	$classifier->train('fr', SERVER_ROOT . "/Lib/LanguageDetector/" . 'etc/data/french.raw');
	$classifier->train('de', SERVER_ROOT . "/Lib/LanguageDetector/" . 'etc/data/german.raw');
	$classifier->train('id', SERVER_ROOT . "/Lib/LanguageDetector/" . 'etc/data/indonesian.raw');
	$classifier->train('jp', SERVER_ROOT . "/Lib/LanguageDetector/" . 'etc/data/japanese.raw');
	$classifier->train('pt', SERVER_ROOT . "/Lib/LanguageDetector/" . 'etc/data/portugese.raw');
	$classifier->train('es', SERVER_ROOT . "/Lib/LanguageDetector/" . 'etc/data/spanish.raw');
	$classifier->save();
	
	// simple prediction function that takes a classifier and a text and echo's the most likely language
	function predict($classifier, $text, $result) {
		$language = $classifier->predict($text);
		echo "{$language} = {$result} @ '{$text}'\n";
	}
	
	//predict($classifier, "Dit is een nederlandse text.", 'nl');
	//predict($classifier, "This is an english text.", 'en');
	//predict($classifier, "Ceci n'est pas une pipe.", 'fr');
	//predict($classifier, "dies ist ein Satz auf Deutsch", 'de');
	//predict($classifier, "esta es una frase en alem�n", 'es');