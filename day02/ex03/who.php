#!/usr/bin/php
<?php
    date_default_timezone_set('Europe/paris');
    $usr = get_current_user();
    $file = file_get_contents("/var/run/utmpx");
    $sub = $file;
    $finaltab = array();
    $typedef   = 'a256user/a4id/a32terminal/ipid/itype/I2time/a256host/i16pad';
    while ($sub != NULL) {
        $array = unpack($typedef, $sub);
        if (strcmp(trim($array[user]), $usr) == 0 && $array[type] == 7)
        {
            $date = date("M j H:i", $array["time1"]);
            $terminal = trim($array[terminal]);
            $terminal = $terminal . "  ";
            $usrr = trim($array[user]);
            $usrr = $usrr . "  ";
            $tab = array($usrr.$terminal.$date);
            $finaltab = array_merge($finaltab, $tab);
        }
        $sub = substr($sub, 628);		
    }
    sort($finaltab);
    $i = 0;
    while ($finaltab[$i])
    {
        echo $finaltab[$i] . "\n";
        $i++;
    }
?>