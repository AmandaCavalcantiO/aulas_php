<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.03 - Funções para arrays");

/*
 * [ criação ] https://php.net/manual/pt_BR/ref.array.php
 */
fullStackPHPClassSession("manipulação", __LINE__);
$index = [
    "AC/DC",
    "Nirvana",
    "Pearl Jam"];
$assoc = [
    "band1" => "AC/DC",
    "band2" => "Nirvana",
    "band3" => "Pearl Jam"
];

var_dump([
    $index,
    $assoc
]);
// Adiciona no início do array
array_unshift($index, "", "Pink Floyd");
// array_unshift($assoc, ["band4" => " " , "band5" => "Pink Floyd"]);
// var_dump($assoc);
var_dump(["Array unshift",$index]);

$assoc = ["band4" => " " , "band5" => "Pink Floyd"] + $assoc;

var_dump(["Utilizando concatenação + com o array antigo no final", $assoc]);

// Adiciona no final do array
array_push($index, "Black Sabbath");

var_dump(["Array Push", $index]);

$assoc = $assoc + ["band6" => ""];
var_dump(["Utilizando concatenação + com o array antigo no início", $assoc]);

array_shift($index);
array_shift($assoc);

var_dump(["Array shift",
    $index,
    $assoc
]);

array_pop($index);
array_pop($assoc);

var_dump(["Array pop",
    $index,
    $assoc
]);

$assoc = $assoc + ["band" => false, "band7" => ''];
array_unshift($index, "", " ", false, null, 0);
var_dump(["Adicionando espaços vazios para exemplo",
    $index,
    $assoc
]);
//Remove as posições vazias de um array -> null/false/0/''
$index = array_filter($index);
$assoc = array_filter($assoc);

var_dump(["Array Filter",
    $index,
    $assoc
]);
/*
 * [ ordenação ] reverse | asort | ksort | sort
 */
fullStackPHPClassSession("ordenação", __LINE__);
//Inverte a ordem do array
$assoc = array_reverse($assoc);
// usando o parametro true ele mantém os index, senão ele reindexa os itens -> em array de index
$index = array_reverse($index, true);


var_dump(["Array Reverse",
    $index,
    $assoc
]);

//Ordena pelo VALUE em ordem alfabetica;
//não modifica index no array de indexs
asort($index, SORT_DESC);
asort($assoc);

var_dump(["Array asort, ordem alfabética",
    $index,
    $assoc
]);

//Ordena pelo KEY em ordem alfabetica;
ksort($index);
ksort($assoc);

var_dump(["Array ksort, ordem alfabética",
    $index,
    $assoc
]);
//Ordena em alfabetica e recria o indice
sort($index);

//Ordena em alfabetica  inversa e recria o indice
rsort($index);
/*
 * [ verificação ]  keys | values | in | explode
 */
fullStackPHPClassSession("verificação", __LINE__);

var_dump([
   array_keys($assoc),
   array_values($assoc)
]);

if (in_array("Nirvana", $assoc)) {
    echo "<p> Yes! Existe </p>";
} else {
    echo "<p> Não encontrado </p>";
}

$assoc = $assoc + ["band6" => null];
var_dump($assoc);

if (array_search("", $assoc)) {
    echo array_search("", $assoc);
}
$arrToString = implode(", ", $assoc);
echo "<p class='text_red'> Eu curto {$arrToString} e algumas outras bandas dessa época! </p>";

$newArray = explode(", ", $arrToString);
array_unshift($newArray, "NOVO ARRAY");
var_dump($newArray);
/**
 * [ exemplo prático ] um template view | implode
 */
fullStackPHPClassSession("exemplo prático", __LINE__);
$profile = [
    "name" => "Amanda",
    "company" => "zzz",
    "email" => "amanda@aaaa.com"
];
