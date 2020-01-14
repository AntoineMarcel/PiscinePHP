<?php
    session_start();

    $file = file_get_contents("private/passwd.csv");
    $file = unserialize($file);
    $i = 0;
    while ($file[$i])
    {
        foreach ($file[$i] as $key => $value)
        {
            if ($key == "login" && $value == $_SESSION['loggued_on_user'])
                unset($file[$i]);
        }
        $i++;
    }
    $file = array_values($file);
    $file = serialize($file);
    file_put_contents("private/passwd.csv", $file . "\n");
    $_SESSION['loggued_on_user'] = "";
    session_destroy();
    header('Location: connect.php');
?>