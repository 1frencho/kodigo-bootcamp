<?php

function insertionSort1($n, $arr)
{
  // Save the value of the last element
  $valueToInsert = $arr[$n - 1];
  $i = $n - 2;

  // Move elements one step to the right until we find the correct position for valueToInsert
  while ($i >= 0 && $arr[$i] > $valueToInsert) {
    $arr[$i + 1] = $arr[$i];
    // Print the array at each step
    echo implode(' ', $arr) . "\n";
    $i--;
  }

  // Place the valueToInsert at the correct position
  $arr[$i + 1] = $valueToInsert;

  // Print the final array
  echo implode(' ', $arr) . "\n";
}

insertionSort1(5, [2, 4, 6, 8, 3]);
