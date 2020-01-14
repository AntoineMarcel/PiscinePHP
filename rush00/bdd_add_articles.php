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
            if ($key == "name" && $value == $login)
                error();
        }
        $i++;
    }
}

if(!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['prix']) && !empty($_POST['categorie']) && !empty($_POST['image']) && $_POST['retour'] != NULL)
{
    if ($_POST['categorie2'] == NULL)
        $newuser = array(array('name'=>$_POST['name'], 'description'=>$_POST['description'], 'prix'=>$_POST['prix'], 'categorie'=>$_POST['categorie'], 'image'=>$_POST['image']));
    else
        $newuser = array(array('name'=>$_POST['name'], 'description'=>$_POST['description'], 'prix'=>$_POST['prix'], 'categorie'=>$_POST['categorie'], 'categorie2'=>$_POST['categorie2'], 'image'=>$_POST['image']));
    if (!file_exists("private"))
        mkdir('private');
    if (file_exists("private/articles.csv"))
    {
        $file = file_get_contents("private/articles.csv");
        $file = unserialize($file);
        search($file, $_POST['name']);
        $final = array_merge($file, $newuser);
        $final = serialize($final);
    }
    else
        $final = serialize($newuser);
    file_put_contents("private/articles.csv", $final . "\n");
    header('Location: '.$_POST["retour"]);
    echo "OK\n";
}
else
    error();
?>