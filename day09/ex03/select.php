<?php
    if (file_exists("list.csv") && filesize("list.csv"))
    {
        $file = file('list.csv');
        echo json_encode(array_reverse($file));
    }
?>