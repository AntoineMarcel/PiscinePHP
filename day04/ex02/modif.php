<?php
function error()
{
    echo "ERROR\n";
    exit();    
}

function search_replace($file, $login, $pass,$newpass)
{
    $i = 0;

    while ($file[$i])
    {
        $username = false;
        $password = false;
        foreach ($file[$i] as $key => $value)
        {
            if ($key == "login" && $value == $login)
                $username = true;
            if ($key == "passwd" && $value == $pass)
            {
                $password = true;
                if ($username == true)
                    $file[$i][$key] = $newpass;
            }
        }
        $i++;
    }
    if (!($username == true && $password == true))
        error();
    return ($file);
}

if($_POST["submit"] != NULL && $_POST["submit"] == "OK")
{

    if (!($_POST['login'] == NULL || $_POST['oldpw'] == NULL || $_POST['newpw'] == NULL))
    {
        $file = file_get_contents("../private/passwd");
        if ($file == NULL)
            error();
        $file = unserialize($file);
        $file = search_replace($file, $_POST['login'], hash("whirlpool", $_POST['oldpw']), hash("whirlpool", $_POST['newpw']));
        $final = serialize($file);
        file_put_contents("../private/passwd", $final . "\n");
        echo "OK\n";
    }
    else
        error();
}
else
    error();
?>