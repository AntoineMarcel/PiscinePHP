<?php
function delsomething($filename, $search, $del)
{
    $file = file_get_contents("private/$filename.csv");
    $file = unserialize($file);
    $i = 0;
    while ($file[$i])
    {
        foreach ($file[$i] as $key => $value)
        {
            if ($key == $search && $value == $del)
                unset($file[$i]);
        }
        $i++;
    }
    $file = array_values($file);
    $file = serialize($file);
    file_put_contents("private/$filename.csv", $file . "\n");
}

delsomething($_POST["filename"], $_POST['search'], $_POST['del']);
if ($_POST["filename"] == "categorie")
{
    echo $_POST['del'];
    delsomething("articles", "categorie", $_POST['del']);
}
header('Location: admin.php');

?>