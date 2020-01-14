<?php
function auth($login, $passwd)
{
    $file = file_get_contents("private/passwd.csv");
    $file = unserialize($file);
    $passwd = hash("whirlpool", $passwd);
    $i = 0;
    while ($file[$i])
    {
        $username = false;
        $password = false;
        $admin = false;
        foreach ($file[$i] as $key => $value)
        {
            if ($key == "login" && $value == $login)
                $username = true;
            if ($key == "passwd" && $value == $passwd)
                $password = true;
            if ($key == "admin" && $value == "1")
                $admin = true;
            
        }
        if ($username == true && $password == true)
            {
                if ($admin == true)
                    return 2;
                return 1;
            }
        $i++;
    }
    return 0;
}
?>