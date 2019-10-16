#!/usr/bin/php
<?php
if ($argc > 1)
{
    $regex = preg_replace('/\s+/', ' ', trim($argv[1]));
    echo $regex;
    echo "\n";
}
?>