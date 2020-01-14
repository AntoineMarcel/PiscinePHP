<?php
    include "auth.php";
    function error()
    {
        $_SESSION['loggued_on_user'] = "";
        header('Location: connect.php?error=Mauvais Mot de Passe / Nom d\'Utilisateur');
        exit();
    }

    session_start();
    if($_POST["login"] != NULL && $_POST["passwd"] != NULL)
    {
        $i = auth($_POST["login"], $_POST["passwd"]);
        if ($i >= 1)
        {
            $_SESSION['admin'] = "0";
            if ($i == 2)
                $_SESSION['admin'] = "1";
            $_SESSION['loggued_on_user'] = $_POST['login'];
            header('Location: connect.php');
        }
        else
            error();
    }       
    else
        error();
?>