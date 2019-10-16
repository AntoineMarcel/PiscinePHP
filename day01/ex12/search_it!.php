#!/usr/bin/php
<?php
if ($argc >= 3)
{
    $i = 2;
    while ($argv[$i])
    {
        $tab = explode(":", $argv[$i]);
        if ($tab[0] == $argv[1])
            $final = $tab[1];
        $i++;
    }
    if ($final != NULL)
        echo "$final\n";
}
?>