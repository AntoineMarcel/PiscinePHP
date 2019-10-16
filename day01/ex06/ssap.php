#!/usr/bin/php
<?php
$i = 1;
if ($argc >= 2)
{
    while($argv[$i])
    {
        $string = $string . " " . $argv[$i];
        $i++;
    }
    $tab = array_filter(explode(" ", $string));
    sort($tab);
    $string = implode("\n", $tab);
    echo "$string\n";
}
?>