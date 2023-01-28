<?php
/*
 * unused with composer
 */
spl_autoload_register('load');

function load ($className)
{
    $file = $className . ".php";
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $file = str_replace('_', DIRECTORY_SEPARATOR, $className);

    if(file_exists($file)) {
        include $file;
    }
}