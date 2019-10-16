#!/usr/bin/php
<?php
if ($argc == 2)
{
    $site = curl_init();

    curl_setopt($site, CURLOPT_URL, $argv[1]);
    curl_setopt($site, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($site, CURLOPT_BINARYTRANSFER, true);

    $matches = curl_exec($site);

    preg_match_all('/<img(?s)(.*?)">/', $matches, $matches);
    preg_match_all('/src="(?s)(.*?)"/', implode("", $matches[0]), $matches);
    
    $last = strrpos($argv[1], "/");
    $namedir = substr($argv[1], $last + 1, strlen($argv[1]) - $last);

    if (($matches[0][0] != NULL) && (!file_exists($namedir)))
        mkdir($namedir);
    $i = 0;
    while ($matches[0][$i])
    {
        $last = strrpos($matches[0][$i], "/");
        $matches[0][$i] = substr($matches[0][$i], $last + 1, strlen($matches[0][$i]) - $last - 2);
        $string = $matches[0][$i];
        if (!file_exists("./$namedir/$string"))
            file_put_contents("./$namedir/$string", "");
        $i++;
    }
    curl_close($site);
}
?>