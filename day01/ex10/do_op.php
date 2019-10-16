#!/usr/bin/php
<?php
if ($argc == 4)
{
    $i = 1;
    while ($argv[$i])
    {
        $argv[$i] = str_replace(" ", "", $argv[$i]);
        $i++;
    }
    if (is_numeric($argv[1]) && is_numeric($argv[3]))
    {
        if ($argv[2] == '+')
            echo $argv[1] + $argv[3];
        else if ($argv[2] == '-')
            echo $argv[1] - $argv[3];
        else if ($argv[2] == '*')
            echo $argv[1] * $argv[3];
        else if ($argv[2] == '/')
            echo $argv[1] / $argv[3];
        else if ($argv[2] == '%')
            echo $argv[1] % $argv[3];
        echo "\n";
    }
    else
        echo "Incorrect Parameters\n";
}
else
    echo "Incorrect Parameters\n";
?>