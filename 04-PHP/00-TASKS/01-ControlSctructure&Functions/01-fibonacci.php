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

function FibonacciGenerator2($n)
{
  if (!is_numeric($n)) {
    echo 'Valor invalido.';
    return;
  }
  echo "<br/>Serie Fibonacci -  Segundo Intento <br/>";
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
