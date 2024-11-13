<?php


/*
Letters in some of the SOS messages are altered by cosmic radiation during transmission. 
Given the signal received by Earth as a string, , determine how many letters of the SOS 
message have been changed by radiation.

ORIGINAL MESSAGE = SOSSOS


RECEIVE -> string s: the string as received on Earth.

Returns -> int: the number of letters changed during transmission.



Constraints
• 1 <= length of s <= 99
• length of s modulo 3 0

• s Will contain only uppercase English letters, ascii[A-Z].

*/

// $s = "SOSTOT";

// Contador de errores: Mantén un contador que se incremente cada vez que encuentres una letra alterada al compararla con el patrón "SOS".


// SOS - SPS - SQS - SOR
// SOS - SPS - SQS


function marsExploration($s)
{
  // Vaa, hay que identificar cada 'SOS' en la cadena de ejemplo.
  $target = 'SOS';

  // Contar las partes diferentes de SOS con el texto de ejemplooo.
  $differences = 0;

  // Ir recorriendo letra por letra.
  for ($i = 0; $i < strlen($s); $i++) {
    // Comparar cada letra con la letra correspondiente en el patrón 'SOS'.
    $currentLetter = $s[$i];

    echo "Current: " . $currentLetter . ' <br/>';
    echo "Target: " .  $target[$i % 3] . '<br/>';

    if ($currentLetter !== $target[$i % 3]) {
      // Incrementar el contador si hay una diferencia entre los dos valores.
      $differences++;
    }
  }
  echo '<br/>';
  return $differences;
}

$sampleInput = "SOSSPSSQSSOR";

// Ya que no me aceptaba comentarios en español, este si lo acepta hacker rank
function marsExploration2($s)
{
  $target = 'SOS';

  $differences = 0;

  for ($i = 0; $i < strlen($s); $i++) {
    $currentLetter = $s[$i];
    if ($currentLetter !== $target[$i % 3]) {
      $differences++;
    }
  }

  return $differences;
}

echo marsExploration($sampleInput);
// echo marsExploration($sampleInput);