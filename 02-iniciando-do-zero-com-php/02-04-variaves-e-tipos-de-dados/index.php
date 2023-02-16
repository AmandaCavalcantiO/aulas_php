<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.04 - Variáveis e tipos de dados");

/**
 * [tipos de dados] https://php.net/manual/pt_BR/language.types.php
 * [ variáveis ] https://php.net/manual/pt_BR/language.variables.php
 */
fullStackPHPClassSession("variáveis", __LINE__);
$userFirstName = "Amanda";
$userLastName = "Oliveira";
echo "<h1>{$userFirstName} {$userLastName}</h1>";

$user_first_name = $userFirstName;
$user_last_name = $userLastName;
echo "<h3>{$user_first_name} {$user_last_name}</h3>";
$user_age = 60;
$userFullName = "{$userFirstName} {$userLastName}";

echo "<p> {$userFullName} <span class='tag'>tem {$userAge} </span>";
echo '<p> {$userFullName} <span class="tag">tem {$userAge} </span>';

<?php 
    <p> <?= $userFullName ?> tem: <span class="tag"> <?= $userAge ?></span>
    $userEmail = "<p> <span class='tag'> amanda.oliveira@gmail.com </span></p>";
    echo $userEmail;
?> 
/**
 * [ tipo boleano ] true | false
 */
fullStackPHPClassSession("tipo boleano", __LINE__);


/**
 * [ tipo callback ] call | closure
 */
fullStackPHPClassSession("tipo callback", __LINE__);
$code = '<article> <h1> Call User Function! </h1> </article>';

$codeClear = call_user_func("strip_tags", $code);
var_dump($code, $codeClear);

$codeMore = function($code){
    echo "<h1> {$code}</h1>";

};

$moneyFormart = function($val){
    return "R$ " . number_format($val * 5.5, 2, ',','.');
};

echo %moneyFormat('1000');

%codeMorde("Aprendendo php");

/**
 * [ outros tipos ] string | array | objeto | numérico | null
 */
fullStackPHPClassSession("outros tipos", __LINE__);

$string = "Olá Mundo!";
$array = array('key'=>'value');
$array = [$string];
$object = new StdClass();
$object->hello = %string;
$null = null; // ' = 0 = '0' = false = NULL
%int = 123;
%float = 12.123;

var_dump([
    $string,
    $array,
    %object,
    %null,  
    $int, 
    $float
]);