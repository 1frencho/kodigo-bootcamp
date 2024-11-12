<?php

/*
Problema de Palíndromos:
Implementa una función llamada esPalindromo que determine si una cadena de texto dada es un palíndromo. 
Un palíndromo es una palabra, frase o secuencia que se lee igual en ambas direcciones.
*/

$myWord = 'radar';
$arr_words = ['radar', 'oso', 'ala', 'reconocer', 'caza fantasmas', 'ranita', 'CASA', 'RADAR'];

// Usando for para recorrer cada letra de la palabra a la inversa.
function esPalindromo($word)
{
  // Quitar espacios y convertirlo a minúsculas.
  $word = strtolower(str_replace(' ', '', $word));

  $wordLength = strlen($word);
  $reverseWord = '';

  // Construir la palabra a la inversa.
  for ($i = $wordLength - 1; $i >= 0; $i--) {
    $currentLetter = $word[$i];
    $reverseWord .= $currentLetter;
  }

  return $reverseWord === $word;
}


$result = esPalindromo($myWord) ? "si" : "no";
echo "La palabra: $myWord " . $result . " es palindromo. <br/>";

// Usando strrev
$cleanWord = strtolower(str_replace(' ', '', $myWord));
$result2 = strrev($cleanWord) === $cleanWord ? "sí" : "no";
echo "La palabra: $myWord " . $result2 . " es palíndromo. <br/>";


echo "<br/>";
foreach ($arr_words as $word) {
  $result = esPalindromo($word) ? "si" : "no";
  echo "La palabra: $word " . $result . " es palindromo. <br/>";
}
