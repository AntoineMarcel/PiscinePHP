<?php
    session_start();

    $file = file_get_contents("private/passwd.csv");
    $file = unserialize($file);
    $i = 0;
    while ($file[$i])
    {
        $value1 = false;
        $value2 = false;
        foreach ($file[$i] as $key => $value)
        {
            if ($key == 'login' && $value == $_POST['login'])
                $value1 = true;
            if ($key == "admin" && $value1 == true)
            {
                if ($value == "0")
                    $file[$i][$key] = "1";
                else
                    $file[$i][$key] = "0";
            }
        }
        $i++;
    }
    $file = serialize($file);
    file_put_contents("private/passwd.csv", $file . "\n");
    header('Location: admin.php');
?>