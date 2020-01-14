<?php
        session_start();
?>

<html>
        <head>
                <link rel="stylesheet" href="style.css" />
        </head>
        <body>
                <?php if ($_SESSION['loggued_on_user'] == NULL): ?>
                
                        <h1>Se connecter</h1>

                        <form method="post" action="login.php">
                                Identifiant: <input type="text" name="login" value="" />
                                <br />
                                Mot de passe: <input type="password" name="passwd" value="" />
                                <input type="submit" name="submit" value="OK" />
                        </form>

                        <div class="erreur">
                                <?php echo $_GET['error']; ?>
                        </div>
                        <br />
                        <a href="create.html">Creer son compte</a>
                <?php else: ?>

                        <h1>Bienvenue <?php echo $_SESSION['loggued_on_user']; ?></h1>
                        <div class="erreur">
                                <?php echo $_GET['error']; ?>
                        </div>
                        <a href="modif.html">Modifier son Mot de Passe</a>
                        <br />
                        <a href="delaccount.php">Supprimer son compte</a>
                        <br />
                        <a href="logout.php">Deconnection</a>

                <?php endif; ?>
        </body>
</html>