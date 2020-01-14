<?php 
$action = "";
$name = "";
$valeur = "";

if (array_key_exists("action", $_GET))
{
    foreach ($_GET as $key => $value)
    {
        if ($key == "action")
            $action= $value;
        if ($key == "name")
            $name= $value;
        if ($key == "value")
            $valeur= $value;
    }
    if ($action == "set" && (!$name || !$valeur))
        exit();
    else if ($action == "set")
        setcookie($name, $valeur);
    if ($action == "get" && !$name)
        exit();
    else if ($action == "get" && $_COOKIE[$name] != NULL)
        echo $_COOKIE[$name] . "\n";
    if ($action == "del" && !$name)
        exit();
    else if ($action == "del")
        setcookie($name, "", time() - 3600);
}
?>