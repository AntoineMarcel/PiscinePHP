<?php
        session_start();
?>

<html>
    <head>
    <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <?php if ($_SESSION['admin'] == "1"): ?>
            <h1> Bienvenue </h1>
        <?php else: ?>
            <?php exit(); ?>
        <?php endif; ?>
       
    </body> 
</html>

<div class="erreur">
    <?php echo $_GET['error']; ?>
</div>
<hr noshade>
<h1>Gestion Users</h1>
<?php
        $file = file_get_contents("private/passwd.csv");
        $file = unserialize($file);
        $i = 0;
        ?>
        <table >
        <tr><th>Login</th><th>Admin</th><th>Change Perm</th><th>Del Usr</th></tr>
        <?php
            while ($file[$i])
            {
                if ($file[$i]['login'] != $_SESSION['loggued_on_user'])
                {
                    echo "<tr>";
                    echo "<td>" . $file[$i]['login'] . "</td>";
                    echo "<td>" . $file[$i]['admin'] . "</td>";
                    $admin = $file[$i]['admin'] == "1" ? "Unset Admin" : "Set Admin";
                    ?>
                        <td>
                            <form method="post" action="adminperm.php">
                                <input type="hidden" name="login" value="<?php echo $file[$i]['login']?>" />
                                <input type="submit" name="submit" value="<?php echo $admin?>"/>
                            </form>
                        </td>
                        <td>
                            <form method="post" action="deluser.php">
                                <input type="hidden" name="login" value="<?php echo $file[$i]['login']?>" />
                                <input type="submit" name="submit" value="Delete"/>
                            </form>
                        </td>
                    <?php
                    echo "</tr>";
                }
                $i++;
            }
            echo "</table>";
        ?>
        <?php
?>
<br />
<hr noshade>
<h1>Gestion Articles</h1>
<br />
<?php
        $file = file_get_contents("private/articles.csv");
        $file = unserialize($file);
        $i = 0;
        ?>
        <table >
        <tr><th>Name</th><th>Content</th><th>Prix</th><th>Categorie</th> <th>Change</th></tr>
        <?php
            while ($file[$i])
            {
                echo "<tr>";
                echo "<td>" . $file[$i]['name'] . "</td>";
                echo "<td>" . $file[$i]['description'] . "</td>";
                echo "<td>" . $file[$i]['prix'] . "</td>";
                echo "<td>" . $file[$i]['categorie'] . "</td>";
                ?>
                    <td>
                        <form method="post" action="delarticle.php">
                            <input type="hidden" name="filename" value="articles" />
                            <input type="hidden" name="search" value="name" />
                            <input type="hidden" name="del" value="<?php echo $file[$i]['name']?>" />
                            <input type="submit" name="submit" value="-"/>
                        </form>
                    </td>
                <?php
                echo "</tr>";
                $i++;
            }
            echo "</table>";
        ?>
        <?php
?>
<br />
<hr noshade>
<h1>Creation Articles</h1>
<br />
<form method="post" action="bdd_add_articles.php">
        Nom de l'article: <input type="text" name="name" value="" />
        <br />
        Description: <input type="text" name="description" value="" />
        <br />
        Prix: <input type="number" name="prix" value="" min="1" max="500"/>
        <br />
        Categorie:
        <select name="categorie">
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
         <select name="categorie2">
         <option disabled selected value> -- select an option -- </option>
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
         <br />
         Image:
         <select name="image">
            <?php
                $path    = 'img';
                $files = scandir($path);
                $files = array_diff(scandir($path), array('.', '..'));
                foreach ($files as $values)
                    echo "<option value=". $values .">" . $values ."</option>";
            ?>
         </select>
         <br />
        <input type="hidden" name="retour" value="admin.php" />
        <input type="submit" name="submit" value="OK" />
</form>

<form action="bdd_upload_img.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>


<br />
<hr noshade>
<h1>Modification Articles</h1>
<br />
<form method="post" action="bdd_modify_article.php">
    Article: <input type="text" name="article" value="" />
    <br />
    Nouveau prix: <input type="text" name="newprice" value="" />
    <input type="hidden" name="retour" value="admin.php" />
    <input type="submit" name="submit" value="OK" />
</form>

<br />
<hr noshade>
<h1>Gestion Categories</h1>
<br />
    <?php
        $file = file_get_contents("private/categorie.csv");
        $file = unserialize($file);
        $i = 0;
        ?>
        <table >
        <tr><th>Name</th><th>Change</th></tr>
        <?php
            while ($file[$i])
            {
                echo "<tr>";
                echo "<td>" . $file[$i]['categorie'] . "</td>";
                ?>
                    <td>
                        <form method="post" action="delarticle.php">
                            <input type="hidden" name="filename" value="categorie" />
                            <input type="hidden" name="search" value="categorie" />
                            <input type="hidden" name="del" value="<?php echo $file[$i]['categorie']?>" />
                            <input type="submit" name="submit" value="-"/>
                        </form>
                    </td>
                <?php
                echo "</tr>";
                $i++;
            }
            echo "</table>";
    ?>
<br />
<hr noshade>
<h1>Creation Categories</h1>
<br />
<form method="post" action="bdd_add_categories.php">
        Nouvelle Categorie: <input type="text" name="categorie" value="" />
        <input type="hidden" name="retour" value="admin.php" />
        <input type="submit" name="submit" value="OK" />
</form>
<br />
<hr noshade>
<h1>Liste des commandes</h1>
<br />
<?php
    $file = file_get_contents("private/achats.csv");
    $file = unserialize($file);
    $filearticle = file_get_contents("private/articles.csv");
    $filearticle = unserialize($filearticle);
    $i = 0;
    $d = 0;
    echo "<table>";
    while ($file[$i])
    {
        echo "<tr><th>Acheteur :" . $file[$i]['login'] . "</th><th>Produits achetes</th><th>Quantite</th><th>Prix</th></tr>";
        while ($file[$i][$d])
        {


            $prixproduit = "";
            foreach ($filearticle as $panier)
            {
                    foreach ($panier as $key => $value)
                        if ($key == 'name' && $value == $file[$i][$d]['article'])
                            $prixproduit = $panier['prix'];
            }
            echo "<tr><th></th><td>" . $file[$i][$d]['article'] . "</td>" . "<td>" . $file[$i][$d]['quantite'] . "</td>";
            if ($prixproduit != NULL)
                echo "<td>". $prixproduit * $file[$i][$d]['quantite']."</td>";
            else
                echo "<td>Inc. Product</td>";
            echo "</tr>";
            $d++;
        }
        $d = 0;
        $i++;
    }
    echo "</table>";
?>
