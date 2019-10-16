#!/usr/bin/php
<?php
if ($argc == 2)
{
    $argv[1] = implode(" ", array_filter(explode(" ", $argv[1])));
    echo "$argv[1]\n";  
}
?>