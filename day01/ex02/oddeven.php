#!/usr/bin/php
<?php
$num = 0;
while (1)
{
    echo "Entrez un nombre: ";
    $num = trim(fgets(STDIN));
	if (feof(STDIN) == TRUE)
		break;
    if (!is_numeric($num))
        echo "'$num' n'est pas un chiffre\n";
    else if ($num % 2 == 0)
        echo "Le chiffre $num est Pair\n";
    else
        echo "Le chiffre $num est Impair\n";
}
?>