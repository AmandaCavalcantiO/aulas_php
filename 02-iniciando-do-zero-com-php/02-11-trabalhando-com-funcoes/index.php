<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.11 - Trabalhando com funções");

/*
 * [ functions ] https://php.net/manual/pt_BR/language.functions.php
 */
fullStackPHPClassSession("functions", __LINE__);

require __DIR__ . "/functions.php";
var_dump(functionName("Amanda", "Maki"));
//var_dump(functionName("Amanda"));
var_dump(optionalArgs("Amanda", "Maru"));

/*
 * [ global access ] global $var
 */
fullStackPHPClassSession("global access", __LINE__);

$weight = 43;
$height = 1.55;
echo "Seu imc é de : " . calcImc();
/*
 * [ static arguments ] static $var
 */
fullStackPHPClassSession("static arguments", __LINE__);
$pay = payTotal(200);
$pay = payTotal(300);
$pay = payTotal(500);

echo $pay;

/*
 * [ dinamic arguments ] get_args | num_args
 */
fullStackPHPClassSession("dinamic arguments", __LINE__);
var_dump(myClass("Amanda", "Maki", "Maru"));
