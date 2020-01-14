<?php
function error()
{
    echo "ERROR\n";
    header('Location: admin.php?error=Erreur de Suppression');
    exit();
}
    if ($_POST["login"] != NULL)
    {
        $file = file_get_contents("private/passwd.csv");
        $file = unserialize($file);
        $i = 0;
        while ($file[$i])
        {
            foreach ($file[$i] as $key => $value)
            {
                if ($key == 'login' && $value == $_POST["login"])
                    unset($file[$i]);
            }
            $i++;
        }
        $file = array_values($file);
        $file = serialize($file);
        file_put_contents("private/passwd.csv", $file . "\n");
    }
    else
        error();
    header('Location: admin.php');
?>