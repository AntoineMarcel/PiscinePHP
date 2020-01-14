<?php
    $newuser = $_GET['todo'];

    if (file_exists("list.csv") && filesize("list.csv"))
    {
        $file = file('list.csv');
        foreach ($file as $key => $values)
        {
            if ($newuser == explode(";",$values)[1])
                unset($file[$key]);
        }
        $final = implode("", $file);
        file_put_contents("list.csv", $final);
    }
?>