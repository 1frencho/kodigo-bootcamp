<?php

/*
- ***Happy Number***
    
    *Write an algorithm to determine if a number `n` is happy.*
    
    *A **happy number** is a number defined by the following process:*
    
    - *Starting with any positive integer, replace the number by the sum of the squares of its digits.*
    - *Repeat the process until the number equals 1 (where it will stay), or it **loops endlessly in a cycle** which does not include 1.*
    - *Those numbers for which this process **ends in 1** are happy.*
    
    *Return `true` if `n` is a happy number, and `false` if not.*
    
    ***Example 1:***
    
    ```
    **Input:** n = 19
    **Output:** true
    
    **Explanation:**
    12 + 92 = 82
    82 + 22 = 68
    62 + 82 = 100
    12 + 02 + 02 = 1
    ```
    
    ***Example 2:***
    
    ```
    **Input:** n = 2
    **Output:** false
    ```
    
    ***Constraints:***
    
    - `1 <= n <= 231 - 1`

*/


function isHappy($n)
{
  // A set to keep track of numbers we've seen to detect cycles
  $seen = [];

  // Repeat the process until we find that n equals 1 or we enter a cycle
  while ($n != 1 && !isset($seen[$n])) {
    // Mark the current number as seen
    $seen[$n] = true;

    // Calculate the sum of the squares of the digits of n
    $n = sumOfSquaresOfDigits($n);
  }

  // Return true if n equals 1, otherwise false (indicating a cycle)
  return $n == 1;
}



function sumOfSquaresOfDigits($num)
{
  $sum = 0;

  // Extract and square each digit
  while ($num > 0) {
    $digit = $num % 10;
    $sum += $digit * $digit;
    $num = intval($num / 10);
  }

  return $sum;
}
