<?php


/* Ejemplo:
Salida: ["php" ,
Ejercicio 1: Ordenando Palabras por Longitud
Dado un array de palabras, ordena las palabras por longitud de manera ascendente. Puedes
usar el algoritmo de burbuja para este ejercicio.
"array", "datos" ,
Entrada: ["php", "programación", "ordenamiento", "array", "datos", ordenamiento " , "programación "] )


*/


// Bubble Sort Array

function bubbleSort($array)
{
  $result = $array;
  $length = count($array);
  $isSwapped = true;

  while ($isSwapped) {
    $isSwapped = false;

    for ($i = 0; $i < $length - 1; $i++) {
      if (strlen($result[$i]) > strlen($result[$i + 1])) {
        $temp = $result[$i];
        $result[$i] = $result[$i + 1];
        $result[$i + 1] = $temp;
        $isSwapped = true;
      }
    }
    $length--;
  }
  return $result;
}

$array = ["php", "programación", "ordenamiento", "array", "datos", "ordenamiento", "programación "];

// $arrayNumber = [12, 12, 0, 1, 2, 4, 5, 6, 10, 32];

$sortedArray = bubbleSort($array);



echo implode(' ', $sortedArray) . "<br/>";
