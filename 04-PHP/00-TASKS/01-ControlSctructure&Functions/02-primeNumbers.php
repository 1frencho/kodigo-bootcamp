<?php
/*
  Problema de números Primos:
  Crea una función llamada esPrimo que determine si un número dado es primo o no.
  Un número primo es aquel que solo es divisible por 1 y por sí mismo.
*/
// 2. 
function esPrimo($number)
{
  // Números menores a dos, no son primos.
  if (!is_numeric($number) || $number < 2) {
    return false;
  }
  // El 2 es el único número par que es primo.

  // Recorre desde el 2 hasta la raíz cuadrada del número.
  for ($i = 2; $i <= sqrt($number); $i++) {
    // Si el residuo de dividir $number entre $i da 0, no es primo.
    if ($number % $i == 0) {
      // El número es divisible entre más números, no puede tener más de 2.
      return false;
    }
  }
  // Si no se encontraron divisores, el número es primo.
  return true;
}

// Prueba de la función
echo esPrimo(2) ? 'Es número primo.' : 'No es número primo.';

echo '<br/>';
// Usando arrays.

$arr_numbers = [1, 2, 3, 4, 5, 10, 8, 20, 35, 70, 20, 15, 60];

function arrEsPrimo($arr_numbers)
{
  $arrCount = count($arr_numbers);
  for ($i = 0; $i < $arrCount; $i++) {
    $currentValue = $arr_numbers[$i];
    $result = esPrimo($currentValue) ? 'Es número primo.' : 'No es número primo.';
    echo "El número $currentValue " . $result . "<br/>";
  }
}

arrEsPrimo($arr_numbers);

/* Resultados
Es número primo.
El número 1 No es número primo.
El número 2 Es número primo.
El número 3 Es número primo.
El número 4 No es número primo.
El número 5 Es número primo.
El número 10 No es número primo.
El número 8 No es número primo.
El número 20 No es número primo.
El número 35 No es número primo.
El número 70 No es número primo.
El número 20 No es número primo.
El número 15 No es número primo.
El número 60 No es número primo.

*/