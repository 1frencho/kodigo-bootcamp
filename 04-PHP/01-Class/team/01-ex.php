<?php
function heightChecker($heights)
{
  // Crear una copia del arreglo para ordenarlo
  $expected = $heights;
  $expected = bubbleSort($expected); // Ordenar usando la función de burbuja

  $count = 0;
  // Contar las posiciones donde heights[i] != expected[i]
  for ($i = 0; $i < count($heights); $i++) {
    if ($heights[$i] != $expected[$i]) {
      $count++;
    }
  }
  return $count;
}

function bubbleSort($arr)
{
  // Número de elementos del arreglo
  $n = count($arr);

  // 
  for ($i = 0; $i < $n - 1; $i++) {
    for ($j = 0; $j < $n - $i - 1; $j++) {
      // El valor del arreglo es mayor que el siguiente
      if ($arr[$j] > $arr[$j + 1]) {
        $temp = $arr[$j];
        // Cambiar el valor del arreglo
        $arr[$j] = $arr[$j + 1];
        // Asignar el valor temporal en una posición posterior
        $arr[$j + 1] = $temp;
      }
    }
  }
  return $arr;
}

function bubbleSort2($array)
{
  $result = $array;
  $length = count($array);
  $isSwapped = true;

  while ($isSwapped) {
    $isSwapped = false;

    for ($i = 0; $i < $length - 1; $i++) {
      if ($result[$i] > $result[$i + 1]) {
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

// Ejemplo de uso
$heights = [1, 1, 4, 2, 1, 3];
echo "Output: " . heightChecker($heights); // Salida esperada: 3