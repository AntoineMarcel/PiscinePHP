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
            if ($key == "categorie" && $value == $login)
                error();
        }
        $i++;
    }
}

if (!empty($_POST['categorie']) && $_POST['retour'] != NULL) 
{

    $newuser = array(array('categorie'=>$_POST['categorie']));
    if (!file_exists("private"))
        mkdir('private');
    if (file_exists("private/categorie.csv"))
    {
        $file = file_get_contents("private/categorie.csv");
        $file = unserialize($file);
        search($file, $_POST['categorie']);
        $final = array_merge($file, $newuser);
        $final = serialize($final);
    }
    else
        $final = serialize($newuser);
    file_put_contents("private/categorie.csv", $final . "\n");
    header('Location: '.$_POST["retour"]);
    echo "OK\n";
}
else
    error();
?>