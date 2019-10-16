#!/usr/bin/php
<?php
if ($argc == 2)
{
    $tab = file('php://stdin');
    unset($tab[0]);
    if ($argv[1] == "moyenne")
    {
        $i = 1;
        $nb = 0;
        while ($tab[$i])
        {
            $notes = explode (";", $tab[$i]);
            if (strlen($notes[1]) && $notes[2] != "moulinette")
            {
                $average += $notes[1];
                $nb++;
            }
            $i++;
        }
        echo $average / $nb."\n";
    }
    else if ($argv[1] == "moyenne_user" || $argv[1] == "ecart_moulinette")
    {
        sort($tab);
        $i = 0;
        while ($tab[$i])
        {
            $name = explode(";", $tab[$i])[0];
            $moyenne=0; 
            $nb=0;
            $moulinette = 0;
            while (explode (";", $tab[$i])[0] == $name)
            {
                $notes = explode (";", $tab[$i]);
                if ($notes[0] == $name)
                {
                    if (strlen($notes[1]) && $notes[2] == "moulinette")
                        $moulinette = $notes[1];
                    if (strlen($notes[1]) && $notes[2] != "moulinette")
                    {
                        $moyenne += $notes[1];
                        $nb++;
                    }
                }
                $i++;
            }
            if ($argv[1] == "ecart_moulinette")
                echo $name . ":" . (($moyenne / $nb) - $moulinette) ."\n";
            else
                echo $name . ":" . $moyenne / $nb."\n";
        }
    }
}
?>