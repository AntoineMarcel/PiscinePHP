<?php
    function error($string)
    {
        echo "ERROR\n";
        header('Location: admin.php?error='.$string);
        exit();
    }

    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(isset($_POST["submit"])) 
    {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check === false) 
            error("File is not an image.");
    }
    if (file_exists($target_file))
        error("Sorry, file already exists.");
    if ($_FILES["fileToUpload"]["size"] > 500000)
        echo "Sorry, your file is too large.";

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
        error("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");

    if (!(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))) 
       error("Sorry, there was an error uploading your file.");
    header('Location: admin.php');
?>