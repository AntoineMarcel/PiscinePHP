#!/usr/bin/php
<?php
function ft_is_sort($tab)
{
    $tmp = $tab;
    sort($tmp);

    if ($tmp != $tab)
        return(0);
    else
        return (1);
}
?>