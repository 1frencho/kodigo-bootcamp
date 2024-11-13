<?php

/*
Problema de la serie Fibonacci:
Escribe una función llamada generar Fibonacci que reciba un número n como parámetro y genere los primeros n
términos de la serie Fibonacci. La serie comienza con 0 y 1, y cada término subsiguiente es la suma de los dos anteriores.
*/

// Primer intento:
function FibonacciGenerator($n)
{
  if (!is_numeric($n)) {
    echo 'Valor invalido.';
    return;
  }

  echo "Serie Fibonacci - Primer Intento<br/>";
  $start = 0;
  $lastNumber = 1;

  for ($i = 0; $i < $n; $i++) {
    $nextNumber = $start + $lastNumber;
    echo "Serie N°$i -> $start + $lastNumber = $nextNumber <br/>";
    $start = $lastNumber;
    $lastNumber = $nextNumber;
  }
}

// Segundo intento - El correcto.
function FibonacciGenerator2($n)
{
  if (!is_numeric($n) || $n < 0 || intval($n) != $n) {
    echo 'Valor inválido. Debe ser un número entero no negativo.';
    return;
  }

  echo "<br/>Serie Fibonacci - Segundo Intento <br/>";
  $start = 0;
  $lastNumber = 1;

  for ($i = 0; $i < $n; $i++) {
    echo "Serie N°$i -> $start <br/>";
    $nextNumber = $start + $lastNumber;
    $start = $lastNumber;
    $lastNumber = $nextNumber;
  }
}


// Llamada a la función para generar los primeros 10 términos
FibonacciGenerator(10);

// Llamada a la función para generar los primeros 10 términos
FibonacciGenerator2(10);

/*
Serie Fibonacci - Primer Intento
Serie N°0 -> 0 + 1 = 1
Serie N°1 -> 1 + 1 = 2
Serie N°2 -> 1 + 2 = 3
Serie N°3 -> 2 + 3 = 5
Serie N°4 -> 3 + 5 = 8
Serie N°5 -> 5 + 8 = 13
Serie N°6 -> 8 + 13 = 21
Serie N°7 -> 13 + 21 = 34
Serie N°8 -> 21 + 34 = 55
Serie N°9 -> 34 + 55 = 89

Serie Fibonacci - Segundo Intento
Serie N°0 -> 0
Serie N°1 -> 1
Serie N°2 -> 1
Serie N°3 -> 2
Serie N°4 -> 3
Serie N°5 -> 5
Serie N°6 -> 8
Serie N°7 -> 13
Serie N°8 -> 21
Serie N°9 -> 34

*/