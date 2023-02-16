<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.09 - Closures e generators");

/*
 * [ closures ] https://php.net/manual/pt_BR/functions.anonymous.php
 */
fullStackPHPClassSession("closures", __LINE__);


/*
 * [ generators ] https://php.net/manual/pt_BR/language.generators.overview.php
 */
fullStackPHPClassSession("generators", __LINE__);

$myAge =  function($year){
	$age = date('Y') - $year;
	return "<h1> Você tem {$age} anos! </h1>";
};

echo $myAge;


$iterator = 5515000;

function generatorDate($days){
	for($day = 1; $day < $day < $days; $day++){
		yield date("d/m/Y", strotime("+{$day}days"));
	};
};

foreach(generatorDate($iterator) as $date){
	echo "<small class='tag' style='margin-bottom:5px'> {$date</small>}".PHP_EOL;
}