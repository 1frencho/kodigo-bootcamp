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


/*
"Todos seremos unos cacahuetes"
Array
(
    [t] => 2
    [o] => 4
    [d] => 1
    [s] => 5
    [e] => 4
    [r] => 1
    [m] => 1
    [u] => 2
    [n] => 1
    [c] => 2
    [a] => 2
    [h] => 1
)

*/