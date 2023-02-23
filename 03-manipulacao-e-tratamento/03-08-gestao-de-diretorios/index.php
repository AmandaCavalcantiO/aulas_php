<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.08 - Gestão de diretórios");

/*
 * [ verificar, criar e abrir ] file_exists | is_dir | mkdir  | scandir
 */
fullStackPHPClassSession("verificar, criar e abrir", __LINE__);

$folder = __DIR__ . "/uploads";

if (!file_exists($folder) || !is_dir($folder)) {
    mkdir($folder, 777);
} else {
    var_dump(scandir($folder));
}

/*
 * [ copiar e renomear ] copy | rename
 */
fullStackPHPClassSession("copiar e renomear", __LINE__);

$file =  __DIR__ . "/file.txt";
var_dump(
    pathinfo($file),
    scandir($folder),
    scandir(__DIR__)
);

if (!file_exists($file) && !is_dir($file)) {
    fopen($file, "w");
} else {
    copy($file, $folder . "/" . basename($file));
    var_dump(filemtime($file), filemtime(__DIR__ . "/uploads/file.txt"));

    rename(__DIR__ . "/uploads/file.txt", __DIR__ . "/uploads/" . time() . "." . pathinfo($file)['extension']);
    //rename($file, __DIR__ . "/ uploads / " . time() . pathinfo($file)['extension']);
}


/*
 * [ remover e deletar ] unlink | rmdir
 */
fullStackPHPClassSession("remover e deletar", __LINE__);
//mkdir(__DIR__ . "/remove");
$dirRemove = __DIR__ . "/remove";

if (!file_exists($dirRemove) || !is_dir($dirRemove)) {
    mkdir($dirRemove, 777);
} else {
    $dirFile = array_diff(scandir($dirRemove), ['.', '..']);
    $dirCount = count($dirFile);
    var_dump($dirFile, $dirCount);

    if ($dirCount > 0) {
        foreach ($dirFile as &$value) {
            unlink($dirRemove . "/" . $value);
        }
    }
    rmdir($dirRemove);
}
