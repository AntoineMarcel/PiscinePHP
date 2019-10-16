#!/usr/bin/php
<?php
if ($argc == 2)
{
    $i = 0;
    while ($argv[1][$i])
    {
        if (!is_numeric($argv[1][$i]) && ($argv[1][$i] != ' ' && $argv[1][$i] != '+' && $argv[1][$i] != '-' && $argv[1][$i] != '*' && $argv[1][$i] != '/' && $argv[1][$i] != '%'))
        {
            echo "Syntax Error\n";
            exit;
        }
        $i++;
    }
    $tab = array_filter(explode(" ", $argv[1]));
    if (strpos($argv[1], "+") != false)
    {
        $tab = explode("+", $argv[1]);
        $string = $tab[0] + $tab[1];
        echo "$string\n";
    }
    else if (strpos($argv[1], "*") != false)
    {
        $tab = explode("*", $argv[1]);
        $string = $tab[0] * $tab[1];
        echo "$string\n";
    }
    else if (strpos($argv[1], "/") != false)
    {
        $tab = explode("/", $argv[1]);
        $string = $tab[0] / $tab[1];
        echo "$string\n";
    }
    else if (strpos($argv[1], "%") != false)
    {
        $tab = explode("%", $argv[1]);
        $string = $tab[0] % $tab[1];
        echo "$string\n";
    }
    else if (strpos($argv[1], "-") != false)
    {
        $tab = explode("-", $argv[1]);
        $string = $tab[0] - $tab[1];
        echo "$string\n";
    }
}
else
    echo "Incorrect Parameters\n";

?>