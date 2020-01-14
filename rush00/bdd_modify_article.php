<?php
function error()
{
    echo "ERROR\n";
    header('Location: '.$_POST["retour"].'?error=Erreur de Modification');
    exit();    
}

function search_replace($file, $product, $newprice)
{
    $i = 0;
    while ($file[$i])
    {
        foreach ($file[$i] as $key => $value)
        {
            if ($key == 'name' && $value == $product)
                $file[$i]['prix'] = $newprice;
        }
        $i++;
    }
    return ($file);
}

    if (!($_POST['article'] == NULL || $_POST['newprice'] == NULL))
    {
        if (!is_numeric($_POST['newprice']))
            error();
        $file = file_get_contents("private/articles.csv");
        if ($file == NULL)
            error();
        $file = unserialize($file);
        $file = search_replace($file, $_POST['article'],  $_POST['newprice']);
        $final = serialize($file);
        file_put_contents("private/articles.csv", $final . "\n");
        echo "OK\n";
        header('Location: '.$_POST["retour"]);
    }
    else
        error();
?>