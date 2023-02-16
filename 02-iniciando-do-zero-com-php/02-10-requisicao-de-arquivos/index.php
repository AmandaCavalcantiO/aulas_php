<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.10 - Requisição de arquivos");

/*
 * [ include ] https://php.net/manual/pt_BR/function.include.php
 * [ include_once ] https://php.net/manual/pt_BR/function.include-once.php
 */
fullStackPHPClassSession("include, include_once", __LINE__);

include "config.inc.php";// ".inc" é uma convenção para nomes 
include_once "config.inc.php";

echo SITE_NAME;

/*
 * [ require ] https://php.net/manual/pt_BR/function.require.php
 * [ require_once ] https://php.net/manual/pt_BR/function.require-once.php
 */
fullStackPHPClassSession("require, require_once", __LINE__);


//$view = file_get_contents(__DIR__."/view.php");
//var_dump($view);

$postBlog =[
    "title" => "Lorem Ipsum",
    "subtitle" => "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...",
    "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vitae odio vitae leo viverra vehicula. Donec et dui vel mauris suscipit tempus. Fusce vel massa nec metus sollicitudin vestibulum. Suspendisse aliquam tellus ligula, non aliquam augue luctus non. Nulla commodo metus dui, in suscipit est faucibus ut. Mauris molestie nisi vel lacus viverra, eu sodales urna feugiat. Morbi eget eros sit amet quam sodales imperdiet at sit amet felis. Suspendisse tempus suscipit augue, at varius sem rhoncus et. Nulla fermentum velit id leo sagittis, sit amet viverra nisl cursus. Fusce quis purus felis. Sed eros mauris, pellentesque suscipit efficitur vulputate, varius eu dui. Duis nibh urna, consectetur et varius sed, elementum sed leo.

    Proin mauris sem, interdum vitae arcu sed, fermentum imperdiet risus. Donec lobortis mauris nec nisl rutrum, id scelerisque purus pulvinar. Pellentesque semper augue nulla, vel condimentum libero dapibus eget. Phasellus eu ipsum vitae diam rutrum tristique. Nam sagittis tristique arcu, eget placerat sapien mattis quis. Etiam facilisis consectetur lacus scelerisque euismod. Nam pulvinar eros et ex bibendum volutpat. Vestibulum quis rhoncus dolor. Suspendisse tristique felis turpis, sit amet commodo massa varius quis. Vivamus justo nulla, dictum in nisl euismod, facilisis venenatis orci. Nulla non mi at risus bibendum fermentum. Fusce mattis, arcu eu pharetra fermentum, risus dui ornare enim, commodo porttitor enim est sit amet magna. Ut eget nulla non orci dignissim lacinia vel vitae felis. Vestibulum et metus congue, accumsan tellus eu, pulvinar massa. Nulla id iaculis metus."
];

if($postBlog){
    require "view.php";
    $post = str_replace(['#TITLE#', '#SUBTITLE#', '#CONTENT#'], $postBlog, $view);
};
