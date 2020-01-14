<?php
    function error($string)
    {
        echo "ERROR\n";
        header('Location: panier.php?error=' . $string);
        exit();
    }
        session_start();
        $file = file_get_contents("private/articles.csv");
        $file = unserialize($file);
        $count = 0;
        $i = 0;
        if ($_SESSION['loggued_on_user'] != NULL)
            $achat = array('login' => $_SESSION['loggued_on_user']);
        else
            error("Vous devez etre log");
        $_SESSION['panier'] = array_values($_SESSION['panier']);

        while ($_SESSION['panier'][$i])
        {
                $elements = explode(",",$_SESSION['panier'][$i]);
                foreach ($file as $panier)
                {
                        foreach ($panier as $key => $value)
                                if($key == "name" && $value == $elements[0])
                                {
                                        $paniervide = true;
                                        $article = array(array('article' => $elements[0], 'quantite' => $elements[1]));
                                        $achat = array_merge($achat, $article);
                                }
                }
                $i++;
        }
        if ($paniervide == false)
            error("Panier vide");
        $_SESSION['panier'] = "";
        $achat = array($achat);
        if (!file_exists("private"))
            mkdir('private');
        if (file_exists("private/achats.csv"))
        {
            $file = file_get_contents("private/achats.csv");
            $file = unserialize($file);
            $final = array_merge($file, $achat);
            $final = serialize($final);
        }
        else
            $final = serialize($achat);
        file_put_contents("private/achats.csv", $final . "\n");
        header('Location: panier.php');
?>