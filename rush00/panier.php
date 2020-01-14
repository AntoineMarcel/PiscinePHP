<?php
        session_start();
?>
<head>
        <link rel="stylesheet" href="style.css" />
</head>
<html>
        <body>
                <img src="img/panier.png" alt="panier"/>
                <br />
                <?php
                        $file = file_get_contents("private/articles.csv");
                        $file = unserialize($file);
                        $count = 0;
                        
                        foreach ($_SESSION['panier'] as $elements)
                        {
                                $i = 0;
                                $find = false;
                                while ($file[$i])
                                {
                                    foreach ($file[$i] as $key => $value)
                                    {
                                        if ($key == "name" && $value == explode(",", $elements)[0])
                                            $find = true;
                                    }
                                    $i++;
                                }
                                if ($find == true)
                                        $count = $count + intval(explode(",", $elements)[1]);
                        }
                        echo "$count" . " Articles:<br />";
                        $count = 0;
                        $i = 0;
                        $_SESSION['panier'] = array_values($_SESSION['panier']);
                        while ($_SESSION['panier'][$i])
                        {
                                $elements = explode(",",$_SESSION['panier'][$i]);
                                foreach ($file as $panier)
                                {
                                        foreach ($panier as $key => $value)
                                                if($key == "name" && $value == $elements[0])
                                                {
                                                        echo "$elements[1]  $elements[0] ";
                                                        echo $panier['prix'] . "€ /unite"  ;
                                                        $count = $count + (intval($panier['prix']) * $elements[1]);
                                                }
                                }
                                echo "<br />";
                                $i++;
                        }
                        echo "Total : $count €<br />";
                ?>

                <a href="achat.php">Acheter</a>
                <div class="erreur">
                        <?php echo $_GET['error']; ?>
                </div>
                <br />
        </body>
</html>