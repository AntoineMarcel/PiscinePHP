#!/usr/bin/php
<?php
  date_default_timezone_set("Europe/Paris");

  if ($argc < 2) {return ;}

  $reg = "/^([Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche) [0-9]{1,2} ([Jj]anvier|[Ff]evrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]out|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd]ecembre) [0-9]{4} [0-2][0-9]:[0-5][0-9]:[0-5][0-9]$/";

  $str = $argv[1];
  $frenchMonthswithoutaccent = array('fevrier','aout', 'decembre', 'fevrier','aout', 'decembre');
  $frenchMonthsaccent = array('février', 'août', 'décembre', 'Février', 'Août', 'Décembre');
  $str = str_replace($frenchMonthsaccent, $frenchMonthswithoutaccent, $str);

  if(!preg_match($reg, $str)){
    echo "Wrong Format\n";
    return ;
  }
  $str = strtolower($str);
  $englishMonths = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
  $frenchMonths = array('janvier', 'fevrier', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aout', 'septembre', 'octobre', 'novembre', 'decembre');
  
  $str = str_replace($frenchMonths, $englishMonths, $str);
  
  $englishDays = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
  $frenchDays = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');
  
  $str = str_replace($frenchDays, $englishDays, $str);
  
  echo(strtotime($str) . "\n");
?>