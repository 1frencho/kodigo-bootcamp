<?php

/*
- ***Fizz Buzz***    
  *Given an integer `n`, return a string array `answer` (**1-indexed**) where:*

  - `answer[i] == "FizzBuzz"` if `i` is divisible by `3` and `5`.
  - `answer[i] == "Fizz"` if `i` is divisible by `3`.
  - `answer[i] == "Buzz"` if `i` is divisible by `5`.
  - `answer[i] == i` (as a string) if none of the above conditions are true.
*/


function fizzBuzz($n)
{
  $answers = [];

  for ($i = 1; $i <= $n; $i++) {
    // Add at the end $answers[] 🥸 it's like a array_push, but shorter.

    if ($i % 3 == 0 && $i % 5 == 0) {
      $answers[] = "FizzBuzz";
    } elseif ($i % 3 == 0) {
      $answers[] = "Fizz";
    } elseif ($i % 5 == 0) {
      $answers[] = "Buzz";
    } else {
      $answers[] = strval($i);
    }
  }

  return $answers;
}

// Wiii
print_r(fizzBuzz(3)); //  ["1","2","Fizz"]
print_r(fizzBuzz(5)); //  ["1","2","Fizz","4","Buzz"]
print_r(fizzBuzz(15)); //  ["1","2","Fizz","4","Buzz","Fizz","7","8","Fizz","Buzz","11","Fizz","13","14","FizzBuzz"]


$result = fizzBuzz(3);

print_r($result);
