<?php
function error()
{
    echo "ERROR\n";
    exit();    
}

function search($file, $login)
{
    $i = 0;
    while ($file[$i])
    {
        foreach ($file[$i] as $key => $value)
        {
            if ($key == "login" && $value == $login)
                error();
        }
        $i++;
    }
}

if($_POST["submit"] != NULL && $_POST["submit"] == "OK")
{
    if (!($_POST['login'] == NULL || $_POST['passwd'] == NULL ))
    {
        $newuser = array(array('login'=>$_POST['login'], 'passwd'=>hash("whirlpool", $_POST['passwd'])));
        if (!file_exists("../private"))
            mkdir('../private');
        if (file_exists("../private/passwd"))
        {
            $file = file_get_contents("../private/passwd");
            $file = unserialize($file);
            search($file, $_POST['login']);
            $final = array_merge($file, $newuser);
            $final = serialize($final);
        }
        else
            $final = serialize($newuser);
        file_put_contents("../private/passwd", $final . "\n");
        echo "OK\n";
    }
    else
        error();
}
else
    error();
?>