<?php
    session_start();
    $i = 0;
    $exist = false;
    while ($_SESSION['panier'][$i])
    {
        $element = explode(",",$_SESSION['panier'][$i]);
        if ($element[0] == $_POST['article'])
        {
            $exist = true;
            $element[1] = strval(intval($element[1]) + 1);
            $_SESSION['panier'][$i] = implode(",",$element);
        }
        $i++;
    }
    if ($exist == false)
        $_SESSION['panier'][$i] = $_POST['article'] . ",1";
    header('Location: index.php');
    exit();
?>