#!/usr/bin/php
<?php
if ($argc >= 2)
{
    $tab = array_filter(explode(" ", $argv[1]));
    $tmp = $tab[0];
    unset($tab[0]);
    array_push($tab, $tmp);
    $string = implode(" ", $tab);
    echo "$string\n";
}
?>