<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.07 - Manipulação de arquivos");

/*
 * [ verificação de arquivos ] file_exists | is_file | is_dir
 */
fullStackPHPClassSession("verificação", __LINE__);
$file = __DIR__ . '/arquivo.txt';
$file2 = __DIR__ . '/arquivoPutContent.txt';
$file3 = __DIR__ . '/arquivoDelete.txt';

if (file_exists($file) && (is_file($file))) {
    echo "Existe";
} else {
    echo "Não existe";
}
/*
 * [ leitura e gravação ] fopen | fwrite | fclose | file
 */
fullStackPHPClassSession("leitura e gravação", __LINE__);
if (!file_exists($file) || !is_file($file)) {
    $fileOpen = fopen($file, "w");
    fwrite($fileOpen, "linha 1" . PHP_EOL);
    fwrite($fileOpen, "linha 2" . PHP_EOL);
    fwrite($fileOpen, "linha 3" . PHP_EOL);
    fwrite($fileOpen, "linha 4" . PHP_EOL);
    fwrite($fileOpen, "linha 5" . PHP_EOL);

    fclose($fileOpen);
} else {
    var_dump(file($file), pathinfo($file));
}
$fileRead = fopen($file, "r");
while (!feof($fileRead)) {
    echo  "<p>" . fgets($fileRead) . "</p>";
}
fclose($fileRead);
 /*
 * [ get, put content ] file_get_contents | file_put_contents
 */
fullStackPHPClassSession("get, put content", __LINE__);
if (file_exists($file2) && (is_file($file2))) {
    echo file_get_contents($file2);
} else {
    $data = "<article> <h1> Amanda C. </h1> <p> amanda.c@amanda.com </p> </article>";
    file_put_contents($file2, $data);
}


fullStackPHPClassSession("unlink", __LINE__);
if (file_exists($file3) && (is_file($file3))) {
    echo file_get_contents($file3);
    if (unlink($file3)) {
        echo "Arquivo Deletado";
    }
} else {
    $data = "<article> <h1> Amanda C. </h1> <p> amanda.c@amanda.com </p> </article>";
    file_put_contents($file3, $data);
}
