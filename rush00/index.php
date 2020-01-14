<?php
    session_start();
?>
<html>
    <head>
        <link rel="stylesheet" href="style.css" />
    </head>

    <body>
        <div style="display: inline-block">
            <center>
                <h1>Bienvenue sur le site SNEEK.COM</h1>
            </center>
        </div>
        <iframe name="connect" src="connect.php" height="190px" style="float:right; right:0;"></iframe>
        <iframe name="panier" src="panier.php" height="500px" style="float:right;position: absolute; right:0; top:200px"></iframe>
        <?php
            $filecat = file_get_contents("private/categorie.csv");
            $filecat = unserialize($filecat);
            $fileart = file_get_contents("private/articles.csv");
            $fileart = unserialize($fileart);
            $i = 0;
            ?>
            <br />
            <form method="get" action="index.php">
            <select name="categorie" selected="all">
                <option value="all">All</option>
                <?php 
                    $file = file_get_contents("private/categorie.csv");
                    $file = unserialize($file);
                    $i = 0;
                    while ($file[$i])
                    {
                        echo "<option value=". $file[$i]['categorie'] .">" . $file[$i]['categorie'] . "</option>";
                        $i++;
                    }
                ?>
            </select>
            <input type="submit" name="submit" value="OK" />
            </form>
            <?php
                if ($_GET['categorie'] == NULL)
                    $_GET['categorie'] = "all";
                foreach ($filecat as $categories)
                {
                    if($_GET['categorie'] == "all" || $_GET['categorie'] == $categories['categorie'] )
                    {
                        $found = false;
                        ?><div class='categorie'>Categorie: <?php echo $categories['categorie'] ?></div><br /><?php
                        foreach ($fileart as $articles)
                        {
                            if ($articles['categorie'] == $categories['categorie'] || $articles['categorie2'] == $categories['categorie'])
                            {
                                $found = true;
                                ?>
                                <img style="height: 200px;width: 10%;"src="img/<?php echo  $articles['image'] ?>" alt="image"/>
                                <br />
                                <span class='article'>Nom de l'article: <?php echo  $articles['name'] ?></span>
                                <br />
                                <span class='contenu'>Description: <?php echo  $articles['description'] ?></span>
                                <br />
                                <span class='contenu'>Prix: <?php echo  $articles['prix'] ?>€</span>
                                <br />
                                <form method="post" style="display: inline;" action="bdd_panier.php">
                                    <input type="hidden" name="article" value="<?php echo $articles['name']?>" />
                                    <input type="hidden" name="retour" value="index.php" />
                                    <input type="submit" name="submit" value="Mettre dans le panier"/>
                                </form>
                                <br /><br /><br />
                                <?php
                            }
                        }
                        if ($found == false)
                            echo "Pas d'articles dans cette categorie";
                        echo "<br />";
                    }
                }
            ?>
        <br />
        <div class="erreur">
            <?php echo $_GET['error']; ?>
        </div>
    </body>
</html>
