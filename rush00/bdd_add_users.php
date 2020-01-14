<?php
function error()
{
    echo "ERROR\n";
    header('Location: '.$_POST["retour"].'?error=Erreur de Creation');
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
if (!($_POST['login'] == NULL || $_POST['passwd'] == NULL || $_POST['retour'] == NULL))
{
    $newuser = array(array('login'=>$_POST['login'], 'passwd'=>hash("whirlpool", $_POST['passwd']), 'admin'=>'0'));
    if (!file_exists("private"))
        mkdir('private');
    if (file_exists("private/passwd.csv"))
    {
        $file = file_get_contents("private/passwd.csv");
        $file = unserialize($file);
        search($file, $_POST['login']);
        $final = array_merge($file, $newuser);
        $final = serialize($final);
    }
    else
        $final = serialize($newuser);
    file_put_contents("private/passwd.csv", $final . "\n");
    header('Location: '.$_POST["retour"]);
    echo "OK\n";
}
else
    error();
?>