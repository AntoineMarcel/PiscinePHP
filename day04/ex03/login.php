<?php
    include "auth.php";
    function error()
    {
        $_SESSION['loggued_on_user'] = "";
        echo "ERROR\n";
    }

    session_start();
    if($_GET["login"] != NULL && $_GET["passwd"] != NULL)
    {
        if (auth($_GET["login"], $_GET["passwd"]))
        {
            $_SESSION['loggued_on_user'] = $_GET['login'];
            echo "OK\n";
        }
        else
            error();
    }       
    else
        error();
?>