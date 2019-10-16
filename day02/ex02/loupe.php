#!/usr/bin/php
<?php
function zoom_link($string)
{
    $string = preg_replace_callback('/>(?s)(.*?)</', 
        function ($matches) {
            return  '/>' . strtoupper($matches[1]) .'<';
        }, 
    $string);

    $string = preg_replace_callback('/title="(?s)(.*?)"/', 
    function ($matches) {
        return  'title="' . strtoupper($matches[1]) .'"';
    }, 
    $string);

    return ($string);
}

if (file_exists($argv[1])) 
{
    $file = file_get_contents($argv[1]);
    $content = preg_replace_callback('/<a(?s)(.*?)<\/a>/', 
        function ($matches) {
            return  zoom_link($matches[0]);  
        }, 
    $file);
    echo $content . "\n";
}
?>