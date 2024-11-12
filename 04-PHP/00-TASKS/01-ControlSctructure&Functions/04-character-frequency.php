<?php

/*
Problema de Frecuencia de Caracteres:
Implementa una función que tome una cadena de texto y 
devuelva un array asociativo que muestre la frecuencia de cada carácter en la cadena.

*/

$myString = 'Todos seremos unos cacahuetes';

function characterFrequency($string)
{
  $arrFrequency = [];

  $string = strtolower(str_replace(' ', '', $string));

  $stringLen = strlen($string);

  for ($i = 0; $i < $stringLen; $i++) {
    $currentLetter = $string[$i];

    if (isset($arrFrequency[$currentLetter])) {
      $arrFrequency[$currentLetter]++;
    } else {
      $arrFrequency[$currentLetter] = 1;
    }
  }
  return $arrFrequency;
}

echo "<h2>$myString</h2>";

echo '<pre>';
print_r(characterFrequency($myString));
echo '</pre>';
