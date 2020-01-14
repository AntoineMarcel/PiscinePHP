<?php
    mkdir('private');
    
    $passwd = 'a:1:{i:0;a:3:{s:5:"login";s:4:"root";s:6:"passwd";s:128:"06948d93cd1e0855ea37e75ad516a250d2d0772890b073808d831c438509190162c0d890b17001361820cffc30d50f010c387e9df943065aa8f4e92e63ff060c";s:5:"admin";s:1:"1";}}';
    file_put_contents("private/passwd.csv", $passwd . "\n");
    $categories = 'a:2:{i:0;a:1:{s:9:"categorie";s:5:"Homme";}i:1;a:1:{s:9:"categorie";s:5:"Femme";}}';
    file_put_contents("private/categorie.csv", $categories . "\n");
    $articles = 'a:3:{i:0;a:5:{s:4:"name";s:12:"Nike Air Max";s:11:"description";s:38:"De bonnes chaussures tres confortables";s:4:"prix";s:3:"150";s:9:"categorie";s:5:"Homme";s:5:"image";s:10:"airmax.png";}i:1;a:5:{s:4:"name";s:8:"Huarache";s:11:"description";s:34:"Des chaussures pour tout les jours";s:4:"prix";s:3:"190";s:9:"categorie";s:5:"Femme";s:5:"image";s:12:"huarache.png";}i:2;a:5:{s:4:"name";s:10:"Air Jordan";s:11:"description";s:16:"Tres confortable";s:4:"prix";s:3:"250";s:9:"categorie";s:5:"Homme";s:5:"image";s:10:"jordan.jpg";}}';
    file_put_contents("private/articles.csv", $articles . "\n");
?>