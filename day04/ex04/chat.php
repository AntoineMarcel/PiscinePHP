<?php
    date_default_timezone_set("Europe/Paris");

    if (file_exists("../private/chat"))
    {
        $fd = fopen("../private/chat");
        flock($fd, LOCK_SH | LOCK_EX);
        $file = file_get_contents("../private/chat");
        $file = unserialize($file);
        $i = 0;
        while ($file[$i])
        {
            echo date('[H:i]', $file[$i]["time"]) . " " . "<b>" . $file[$i]["login"] . "</b>" . ":" . " " . $file[$i]["msg"] . "<br />";
            $i++;
        }
        flock($fd, LOCK_UN);
    }
?>