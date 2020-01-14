<?php
function auth($login, $passwd)
{
    $file = file_get_contents("../private/passwd");
    $file = unserialize($file);
    $passwd = hash("whirlpool", $passwd);
    $i = 0;
    while ($file[$i])
    {
        $username = false;
        $password = false;
        foreach ($file[$i] as $key => $value)
        {
            if ($key == "login" && $value == $login)
                $username = true;
            if ($key == "passwd" && $value == $passwd)
                $password = true;
        }
        $i++;
    }
    if ($username == true && $password == true)
        return true;
    return false;
}
?>