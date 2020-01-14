<?php
    $newuser = $_GET['todo'];
    if (file_exists("list.csv") && filesize("list.csv"))
    {
        $count = count(file('list.csv')) + 1;
        $file = file_get_contents("list.csv");
        $newuser = $count . ";" . $newuser;
        $final = $file . $newuser;
    }
    else
        $final = "1;" . $newuser;
    file_put_contents("list.csv", $final . "\n");
    echo ($_GET['todo'] . " as been added in tdl");
?>