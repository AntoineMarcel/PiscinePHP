<?php
    session_start();
    date_default_timezone_set("Europe/Paris");
    if ($_SESSION['loggued_on_user'] != NULL)
    {
        if($_POST["submit"] != NULL && $_POST["submit"] == "Envoyer")
        {
            if ($_POST['msg'] != NULL)
            {
                $newchat = array(array('login'=>$_SESSION['loggued_on_user'], 'time'=>time(), 'msg'=>$_POST['msg']));
                if (file_exists("../private/chat"))
                {
                    $fd = fopen("../private/chat");
                    flock($fd, LOCK_SH | LOCK_EX);
                    $file = file_get_contents("../private/chat");
                    $file = unserialize($file);
                    $final = array_merge($file, $newchat);
                    $final = serialize($final);
                    flock($fd, LOCK_UN);
                }
                else
                    $final = serialize($newchat);
                file_put_contents("../private/chat", $final . "\n");
            }
        }
    }
?>

<head>
    <script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
</head>
<html><body>
    <center>
    <form method="post" action="speak.php">
        Message: <input type="text" name="msg" value="" />
        <input type="submit" name="submit" value="Envoyer" />
    </form>
    </center>
</body></html>  
