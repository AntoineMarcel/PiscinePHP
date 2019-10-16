#!/usr/bin/php
<?php
function ft_split($s1)
{
	$tab = array_filter(explode(" ", $s1));
	if ($s1 != NULL)
        	sort($tab);
	return($tab);
}
?>