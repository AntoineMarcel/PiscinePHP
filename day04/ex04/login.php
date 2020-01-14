<?php
    include "auth.php";
    function error()
    {
        $_SESSION['loggued_on_user'] = "";
        echo "ERROR\n";
        exit();
    }

    session_start();
    if($_POST["login"] != NULL && $_POST["passwd"] != NULL)
    {
        if (auth($_POST["login"], $_POST["passwd"]))
            $_SESSION['loggued_on_user'] = $_POST['login'];
        else
            error();
    }       
    else
        error();
?>

<iframe name="chat" src="chat.php" width="100%" height="550px"></iframe>
<iframe name="speak" src="speak.php" width="100%" height="50px"></iframe>
