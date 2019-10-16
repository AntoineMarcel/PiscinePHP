#!/usr/bin/php
<?php
$i = 1;
if ($argc >= 2)
{
    $tabnum = array();
    $tabother = array();
    $tab = array();
    while($argv[$i])
    {
        $string = $string . " " . $argv[$i];
        $i++;
    }
    $tab = array_filter(explode(" ", $string));
    natcasesort($tab);
    $tab = explode(" ", implode(" ", $tab));
    $i = 0;
    while($tab[$i])
    {
        if (is_numeric($tab[$i]))
        {
            $tmp = $tab[$i];
            unset($tab[$i]);
            array_push($tabnum, $tmp);

        }
        else if (!ctype_alnum($tab[$i]))
        {
            $tmp = $tab[$i];
            unset($tab[$i]);
            array_push($tabother, $tmp);
        }
        $i++;
    }
    sort($tabnum, SORT_STRING);
    sort($tabother, SORT_STRING);
    $finaltab = array_merge($tab, $tabnum);
    $finaltab = array_merge($finaltab, $tabother);
    $string = implode("\n", $finaltab);
    echo "$string\n";
}
?>